<div class="d-block sidebar my-8">
    @if (Session::has('account'))
        <a href="{{route('account.dashboard')}}" class="pb-6 pl-5 d-block text-left">Dashboard</a>
        <a href="{{URL::to('/company')}}" class="pb-6 pl-5 d-block text-left">Companies</a>
        <a href="#" class="pb-6 pl-5 d-block text-left">Contacts</a>
    @else
        <a href="{{route('account.index')}}" class="pb-6 pl-5 d-block text-left">Accounts</a>
    @endIf
</div>
