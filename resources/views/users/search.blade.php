    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-12">
                <form method="post" action="{{route('search')}}">
                    @csrf
                    <div class="form-row d-flex gap-1 flex-row">
                            <input type="text" class="form-control w-100" id="s" placeholder="Введите..." name="name">
                            <button type="submit" class="btn btn-block"><img width="25" src="/public/assets/images/lupa.png"></button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

