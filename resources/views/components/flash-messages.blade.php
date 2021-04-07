<div>
    <section class="contiainer" style="margin-top:10px;">

            @if ($message = Session::get('error'))
            <div class="card-panel red">
                <div class="white-text" role="alert">
                    ❌ {{ $message }}
                  </div>
            </div>
            @endif
        
            @if ($message = Session::get('success'))    <div class="card-panel green lighten-1">
                <div class="white-text" role="alert">
                    ✔️ {{ $message }}
                  </div>
            </div>
            @endif
        
            @if ($message = Session::get('warning'))
            <div class="card-panel yellow lighten-1">
                <div class="black-text" role="alert">
                    ⚠️ {{ $message }}
                  </div>
            </div>
            @endif
        
            @if ($message = Session::get('info'))
            <div class="card-panel blue lighten-2">
                <div class="white-text" role="alert">
                    🛈 {{ $message }}
                  </div>
            </div>
            @endif
   
    </section>
</div>