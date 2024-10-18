@extends("layouts.admin")


@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Connected Instances</h3>
                </div>
                <div class="card-body">
                    not implemented yet
                </div>
                <div class="card-footer">
                        <form action="/force_reload" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info"><span class="fas fa-sync-alt"></span> send reload to all screens</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
