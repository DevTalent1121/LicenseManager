<x-app-layout>
    <x-slot name="header">
        <div class="pl-5 pr-5">
            <h5>
                Welcome, {{$user_email}} | Your Credit: {{$credit}} |  
                <a class="btn btn-success" href="{{ route('licenses.create') }}"> NEW</a>
            </h5>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container mt-5 mb-5">
            <!-- <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-5 mt-5 text-center">
                        <h2>Licenses</h2>
                    </div>
                    <div class="pull-right mb-2">
                    </div>
                </div>
            </div> -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered text-center">
                <tr>
                    <th>Licenses</th>
                    <th width="80px">Action</th>
                </tr>
                @foreach ($licenses as $license)
                <tr>
                    <td>{{ $license->license }}</td>
                    <td>
                        <form action="{{ route('licenses.destroy',$license->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
