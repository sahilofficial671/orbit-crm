<div class="topbar shadow-sm">
    <div class="topbar-left"></div>
    <div class="topbar-middle"></div>
    <div class="topbar-right">
        <ul class="topbar-btns">
            <div class="dropdown user">
                <div class="dropdown-toggle" type="button" id="profileDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->image)
                    <img src="{{Auth::user()->image}}" alt="">
                    @else
                        <span class="ti-user"></span>
                    @endif
                </div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropDown">
                    <a href="#" class="dropdown-item">Working on this right now!</a>
                </div>
              </div>
        </ul>
    </div>
</div>
