@extends('partials.backend.index')

@section('container')
    <div class="htmlContent">
        <h1>Reis Internationaal</h1>
        <p class="date">12/06/2019 - 16/06/2019</p>

        <table class="table-borderless">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Klik op het kaartje om de planning te wijzigen.</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>					  
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Dag 1 - Nevada</h5>
                                <p class="card-text">12/06/2019 <br> Las Vegas</p>
                                <a href="#" class="btn btn-primary">Wijzig planning</a>
                            </div>
                        </div>
                    </td>

                    <td class="vertical">
                        <div class="alert alert-primary" role="alert">
                            Planning onvolledig.
                        </div>
                    </td>

                    <td>					  
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Dag 2 - Nevada</h5>
                                <p class="card-text">13/06/2019 <br> Las Vegas</p>
                                <a href="#" class="btn btn-primary">Wijzig planning</a>
                            </div>
                        </div>
                    </td>

                    <td class="vertical">
                        <div class="alert alert-primary" role="alert">
                            Planning onvolledig.
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Dag 3 - Nevada</h5>
                                <p class="card-text">14/06/2019 <br> Death Valley</p>
                                <a href="#" class="btn btn-primary">Wijzig planning</a>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">

                    </td>
                </tr>
            </tbody>
        </table>		
    </div>

@include('layouts.error')
@endsection

@section('page_specific_scripts')
<!--    <script>CKEDITOR.replace( 'listOfPlanningen' );</script>-->
@endsection
