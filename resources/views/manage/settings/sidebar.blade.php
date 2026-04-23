<div class="list-group list-group-flush">
    <a href="{{route('admin.settings.index')}}" class="list-group-item d-flex align-items-center">
        <i data-feather="globe" class="mr-2 width-15 height-15"></i>
        Update Site
        
  
    <a href="{{route('admin.settings.socials')}}" class="list-group-item">
        <i data-feather="phone" class="mr-2 width-15 height-15"></i>
        Social Links
    </a>
   
    <a href="{{route('slider.index')}}" class="list-group-item">
        <i data-feather="image" class="mr-2 width-15 height-15"></i>
        Page Sliders
    </a>
    {{-- <a href="{{route('admin.news.index')}}" class="list-group-item">
        <i data-feather="image" class="mr-2 width-15 height-15"></i>
        Blogs
    </a>  --}}
    <a href="{{route('admin.faq.index')}}" class="list-group-item">
        <i data-feather="user" class="mr-2 width-15 height-15"></i>
        FAQ
    </a>
    <a href="{{route('admin.settings.aboutus')}}" class="list-group-item">
        <i data-feather="user" class="mr-2 width-15 height-15"></i>
        About us 
    </a>
    <a href="{{route('admin.settings.privacyPolicy')}}" class="list-group-item">
        <i data-feather="columns" class="mr-2 width-15 height-15"></i>
        Privacy Policy 
    </a>
    <a href="{{route('admin.tools.googleClearRedirects')}}" class="list-group-item" onclick="event.preventDefault(); document.getElementById('google-clear-redirects-form').submit()">
        <i data-feather="refresh-cw" class="mr-2 width-15 height-15"></i>
        Run Google Clear Redirects
    </a>
    <form id="google-clear-redirects-form" action="{{route('admin.tools.googleClearRedirects')}}" method="POST" class="d-none">
        @csrf
    </form>
    <a href="{{route('admin.settings.termsConditions')}}" class="list-group-item">
        <i data-feather="info" class="mr-2 width-15 height-15"></i>
        Terms and Conditions 
    </a>

   

  
  
    
</div>