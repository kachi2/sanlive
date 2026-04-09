<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') — Sanlive Pharmacy</title>
    <style>
        *,::before,::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;background:#f0f2f8;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;-webkit-font-smoothing:antialiased}
        .err-wrap{text-align:center;max-width:520px;width:100%}
        .err-logo{margin-bottom:36px}
        .err-logo img{height:48px;object-fit:contain}
        .err-icon{width:100px;height:100px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 28px;font-size:42px}
        .err-code{font-size:clamp(72px,16vw,120px);font-weight:900;line-height:1;letter-spacing:-4px;background:linear-gradient(135deg,#103178 0%,#1a449f 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-bottom:8px}
        .err-title{font-size:22px;font-weight:700;color:#111;margin-bottom:10px}
        .err-msg{font-size:15px;color:#666;line-height:1.6;margin-bottom:32px}
        .err-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
        .err-btn{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;border-radius:10px;font-size:14px;font-weight:700;text-decoration:none;transition:all .15s;border:none;cursor:pointer}
        .err-btn--primary{background:#103178;color:#fff}
        .err-btn--primary:hover{background:#0d2560;box-shadow:0 6px 20px rgba(16,49,120,.3);color:#fff}
        .err-btn--ghost{background:#fff;color:#103178;border:1.5px solid #d5ddf0}
        .err-btn--ghost:hover{background:#f3f6ff;color:#103178}
        .err-divider{margin:48px auto 20px;width:48px;height:3px;border-radius:4px;background:linear-gradient(90deg,#103178,#25d366)}
        .err-footer{font-size:12px;color:#aaa}
        .err-footer a{color:#103178;text-decoration:none}
        .err-footer a:hover{text-decoration:underline}
    </style>
</head>
<body>
    <div class="err-wrap">
        <div class="err-logo">
            <a href="/">
                <svg width="160" height="40" viewBox="0 0 160 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="10" fill="#103178"/>
                    <path d="M20 8C13.373 8 8 13.373 8 20s5.373 12 12 12 12-5.373 12-12S26.627 8 20 8zm1 17h-2v-6h2v6zm0-8h-2v-2h2v2z" fill="#25d366"/>
                    <text x="48" y="27" font-family="system-ui,sans-serif" font-weight="800" font-size="18" fill="#103178">Sanlive</text>
                    <text x="48" y="38" font-family="system-ui,sans-serif" font-weight="400" font-size="10" fill="#888" letter-spacing="2">PHARMACY</text>
                </svg>
            </a>
        </div>

        @yield('error-body')

        <div class="err-divider"></div>
        <p class="err-footer">
            Need help? <a href="mailto:support@sanlivepharmacy.com">Contact Support</a> &nbsp;·&nbsp; <a href="/">Go Home</a>
        </p>
    </div>
</body>
</html>
