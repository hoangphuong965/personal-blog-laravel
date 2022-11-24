<nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <form method="post" action="">
                    @csrf
                    <div class="input-group">
                        <input type="search" name="" id="">
                        <span class="input-group-text" id="basic-addon2">Seach</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a href="{{ route('article.create') }}">Add New</a>
        </div>
    </div>
</nav>