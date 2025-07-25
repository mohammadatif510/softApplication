@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="javascript::void(0)" id="createClientProject" data-id="{{ $clientDetail->id }}" data-bs-toggle="modal"
                    data-bs-target="#createProjecteModal" class="btn btn-outline-primary float-end">Create Project</a>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive" id="clientProjectTableWrapper">
                    <table class="table" id="datatable_2">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Budget</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientProjects as $clientProject)
                            <tr id="role-row-{{ $clientProject->id }}">
                                <td>
                                    {{ $clientProject->title }}

                                </td>
                                <td>
                                    {{ $clientProject->budget->total_budget }}

                                </td>
                                <td>
                                    {{ $clientProject->description }}

                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $clientProject->status }}</span>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                    <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                    <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                    <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="modal fade bd-example-modal-lg " id="createProjecteModal" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" id="create-project-modal-dialog" role="document">

    </div>
    <!--end modal-dialog-->
</div>

</div>

@endsection