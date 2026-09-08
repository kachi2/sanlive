{{-- resources/views/frontend/partials/floating-cart.blade.php --}}
<style>
/* Desktop/laptop: full floating basket panel */
.floating-cart{display:none;position:fixed;bottom:50px;right:20px;z-index:1050;width:320px;max-width:calc(100vw - 40px);max-height:calc(100vh - 120px);background:#fff;border-radius:12px;box-shadow:0 12px 40px rgba(0,0,0,.18);flex-direction:column;overflow:hidden;font-family:inherit}
.floating-cart.has-items{display:flex}
@media(max-width:991px){.floating-cart{display:none!important}}
.floating-cart__header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;background:#103178;color:#fff;font-weight:700;font-size:15px;flex:0 0 auto}
.floating-cart__body{padding:12px 16px;overflow-y:auto;flex:1 1 auto}
.fcart__item{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid #eee}
.fcart__item-img img{width:48px;height:48px;object-fit:contain;border-radius:6px;background:#fafafa}
.fcart__item-info{flex:1;min-width:0}
.fcart__item-name{font-size:13px;font-weight:600;color:#222;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.fcart__item-price{font-size:12px;color:#25a244;font-weight:700;margin:2px 0 6px}
.fcart__item-qty{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.fcart__qty-group{display:flex;align-items:center;gap:6px}
.fcart__qty-btn{width:22px;height:22px;border-radius:4px;border:1px solid #ccc;background:#fff;cursor:pointer;font-size:13px;line-height:1;display:flex;align-items:center;justify-content:center;padding:0}
.fcart__qty-val{font-size:13px;min-width:16px;text-align:center}
.fcart__remove{font-size:11px;color:#e5344c;text-decoration:underline;cursor:pointer}
.fcart__item-total{font-size:13px;font-weight:700;color:#222;white-space:nowrap}
.fcart__summary{padding-top:8px;flex:0 0 auto}
.fcart__row{display:flex;justify-content:space-between;font-size:13px;color:#444;padding:4px 0}
.fcart__row--total{font-size:15px;font-weight:700;color:#111;border-top:1px solid #eee;margin-top:4px;padding-top:8px}
.fcart__note{font-size:11px;color:#999;padding:2px 0 6px}
.fcart__checkout-btn{display:block;text-align:center;margin:0 16px 16px;padding:12px;border-radius:8px;background:#25a244;color:#fff!important;font-weight:700;text-decoration:none!important;flex:0 0 auto}
.fcart__checkout-btn:hover{background:#1e8a38}
.fcart__empty{text-align:center;color:#888;padding:24px 0;font-size:13px}

/* Mobile only: "Added to Basket" confirmation modal, shown right after Add to Cart */
.atc-modal{display:none;position:fixed;inset:0;z-index:1200;align-items:flex-end;justify-content:center;padding:20px;padding-bottom:calc(90px + env(safe-area-inset-bottom));font-family:inherit}
.atc-modal.open{display:flex}
@media(min-width:992px){.atc-modal{display:none!important}}
.atc-modal__backdrop{position:absolute;inset:0;background:rgba(0,0,0,.45)}
.atc-modal__box{position:relative;background:#fff;width:100%;max-width:360px;border-radius:16px;box-shadow:0 12px 40px rgba(0,0,0,.25);overflow:hidden}
.atc-modal__header{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;background:#103178;color:#fff;font-weight:700;font-size:15px}
.atc-modal__close{background:none;border:none;color:#fff;font-size:20px;cursor:pointer;line-height:1;padding:0}
.atc-modal__body{display:flex;gap:12px;padding:16px}
.atc-modal__body img{width:64px;height:64px;object-fit:contain;border-radius:8px;background:#fafafa;flex:0 0 auto}
.atc-modal__info{flex:1;min-width:0}
.atc-modal__name{font-size:14px;font-weight:700;color:#222;margin-bottom:4px}
.atc-modal__meta{font-size:13px;color:#666}
.atc-modal__actions{display:flex;gap:10px;padding:0 16px 16px}
.atc-modal__btn{flex:1;text-align:center;padding:12px;border-radius:8px;font-weight:700;font-size:14px;text-decoration:none!important;cursor:pointer;border:none}
.atc-modal__btn--view{background:#25a244;color:#fff!important}
.atc-modal__btn--continue{background:#f1f1f1;color:#333!important}
</style>

<div id="floating-cart" class="floating-cart {{ ($cartItem ?? 0) > 0 ? 'has-items' : '' }}">
    <div class="floating-cart__header">
        <span>Your Basket</span>
    </div>
    <div class="floating-cart__body" id="floating-cart-body">
        @include('frontend.partials.floating-cart-content')
    </div>
</div>

<div id="added-to-cart-modal" class="atc-modal">
    <div class="atc-modal__backdrop" id="atc-modal-backdrop"></div>
    <div class="atc-modal__box">
        <div class="atc-modal__header">
            <span>Added to Basket</span>
            <button type="button" id="atc-modal-close" class="atc-modal__close" aria-label="Close">&times;</button>
        </div>
        <div class="atc-modal__body">
            <img id="atc-modal-img" src="" alt="">
            <div class="atc-modal__info">
                <div class="atc-modal__name" id="atc-modal-name"></div>
                <div class="atc-modal__meta" id="atc-modal-meta"></div>
            </div>
        </div>
        <div class="atc-modal__actions">
            <button type="button" id="atc-modal-continue" class="atc-modal__btn atc-modal__btn--continue">Continue Shopping</button>
            <a href="{{ route('carts.index') }}" class="atc-modal__btn atc-modal__btn--view">View Cart</a>
        </div>
    </div>
</div>

<script>
(function(){
    var root = document.getElementById('floating-cart');
    var body = document.getElementById('floating-cart-body');

    function csrf(){
        var m = document.querySelector('meta[name="csrf-token"]');
        return m ? m.content : '';
    }

    function applyResponse(data){
        if(typeof data.cartCount !== 'undefined'){
            document.querySelectorAll('.cartReload').forEach(function(el){ el.textContent = data.cartCount; });
            root.classList.toggle('has-items', data.cartCount > 0);
        }
        if(typeof data.html !== 'undefined'){
            body.innerHTML = data.html;
        }
        if(typeof toastr !== 'undefined' && data.message){
            if(data.success === false){ toastr.error(data.message); }
            else { toastr.success(data.message); }
        }
    }

    window.floatingCart = { refresh: applyResponse };

    function ajaxRequest(url, options){
        options = options || {};
        options.headers = Object.assign({
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }, options.headers || {});
        return fetch(url, options)
            .then(function(res){ return res.json().then(function(data){ return { ok: res.ok, data: data }; }); })
            .then(function(result){ applyResponse(result.data); return result; })
            .catch(function(){
                if(typeof toastr !== 'undefined'){ toastr.error('Something went wrong. Please try again.'); }
            });
    }

    body.addEventListener('click', function(e){
        var qtyBtn = e.target.closest('.fcart__qty-btn');
        if(qtyBtn){
            var group = qtyBtn.closest('.fcart__qty-group');
            var cartId = group.getAttribute('data-cart-id');
            var qty = parseInt(group.getAttribute('data-qty'), 10) || 1;
            var form = new FormData();
            form.append('_token', csrf());
            form.append('cartId', cartId);
            form.append('qty', qty);
            form.append('action', qtyBtn.getAttribute('data-op'));
            ajaxRequest('{{ route('carts.update') }}', { method: 'POST', body: form });
            return;
        }
        var removeLink = e.target.closest('[data-cart-remove]');
        if(removeLink){
            e.preventDefault();
            ajaxRequest(removeLink.getAttribute('href'), { method: 'GET' });
        }
    });

    window.floatingCartAjax = ajaxRequest;

    // Mobile "Added to Basket" modal
    var atcModal = document.getElementById('added-to-cart-modal');
    var atcImg = document.getElementById('atc-modal-img');
    var atcName = document.getElementById('atc-modal-name');
    var atcMeta = document.getElementById('atc-modal-meta');

    function closeAtcModal(){ atcModal.classList.remove('open'); }
    document.getElementById('atc-modal-close').addEventListener('click', closeAtcModal);
    document.getElementById('atc-modal-continue').addEventListener('click', closeAtcModal);
    document.getElementById('atc-modal-backdrop').addEventListener('click', closeAtcModal);

    window.showAddedToCartModal = function(item){
        if(!item || !window.matchMedia('(max-width: 991px)').matches) return;
        atcImg.src = item.image || '';
        atcImg.alt = item.name || '';
        atcName.textContent = item.name || '';
        atcMeta.textContent = (item.qty ? 'Qty: ' + item.qty + ' · ' : '') + (item.price || '');
        atcModal.classList.add('open');
    };
})();
</script>
