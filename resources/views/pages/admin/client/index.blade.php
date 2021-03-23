@extends('layouts.dashboard')

@section('title')
    Awann Group
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Master</h2>
            <p class="dashboard-subtitle">
                Daftar Data Client
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class= "col text-left">
                            <a href="{{  route('user.create') }}" class="btn btn-primary mb-3">
                                + Create Client Baru
                            </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Client</th>
                                        <th>Client</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>No NPWP</th>
                                        <th>Status</th>
                                        <th>Setting</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($client as $product)
                                        @php $no++ @endphp
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->address }}</td>
                                            <td>{{ $product->city }}</td>
                                            <td>{{ $product->phone_number }}</td>
                                            <td>{{ $product->email }}</td>
                                            <td>{{ $product->number_ktp }}</td>
                                            <td>{{ $product->number_npwp}}</td>
                                            @if ($product->status == 1)
                                                <td>Aktif</td>
                                                @elseif ($product->status == 2)
                                                <td>Tidak Aktif</td>
                                                @else
                                                <td>Kontrak</td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                                            type="button" id="action {{ $product->id }}"
                                                                data-toggle="dropdown" 
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="action' .  {{ $product->id }} . '">
                                                            <a class="dropdown-item" href="{{ route('user.edit', $product->id) }}">
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('user.destroy', $product->id) }}" method="POST">
                                                                {{ method_field('delete') }} {{ csrf_field() }}
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'number_ktp', name: 'number_ktp' },
                { data: 'phone_number', name: 'phone_number' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush