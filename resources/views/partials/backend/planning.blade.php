@extends('partials.backend.index')

@section('container')
    <div class="htmlContent">
        <h1 >{{ $aTripData[0]->name }}</h1>
        <p class="date">{{$aTripData[0]->start_date }} - {{$aTripData[0]->end_date }}</p>
        
        <table class="table-borderless">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Klik op het kaartje om de planning te wijzigen.</th>
                </tr>
            </thead>
            
            <tbody>
                
                @foreach ($aPlanningen as $daysplannings)
                    @php
                        $i = $daysplannings->day_planning_id;
                    @endphp
                    
                    @if ($daysplannings->day_planning_id % 2 != 0 )			
                        <tr>
                        <td>					  
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">dag {{ $daysplannings->day_planning_id }} - {{$daysplannings->name}}</h5>
                                    <p class="card-text">{{$daysplannings->date}} <br> {{$daysplannings->end_location}}</p>
                                    <a href="{{ route('planningWijzig',[ "id" => $daysplannings->day_planning_id]) }}" class="btn btn-primary">Wijzig planning</a>
                                </div>
                            </div>
                        </td>

                        @if (empty($daysplannings->description) || empty($daysplannings->date) || empty($daysplannings->end_location))					
                            <td class="vertical">
                                <div class="alert alert-primary" role="alert">
                                    Planning onvolledig.
                                </div>
                            </td>
                        @else
                        <td style="padding-left: 150px;"></td>
                        @endif
                       
                    @else
                        <td>					  
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">dag {{ $daysplannings->day_planning_id }} - {{$daysplannings->name}}</h5>
                                    <p class="card-text">{{$daysplannings->date}} <br> {{$daysplannings->end_location}}</p>
                                    <a href="{{ route('planningWijzig',[ "id" => $daysplannings->day_planning_id]) }}" class="btn btn-primary">Wijzig planning</a>
                                </div>
                            </div>
                        </td>

                        @if (empty($daysplannings->description) || empty($daysplannings->date) || empty($daysplannings->end_location))					
                            <td class="vertical">
                                <div class="alert alert-primary" role="alert">
                                    Planning onvolledig.
                                </div>
                            </td>
                        @else
                            <td style="padding-left: 150px;"></td>
                        @endif		
                        </tr>
                    @endif
                    
                    @php
                        $i++
                    @endphp
                @endforeach
            </tbody>
        </table>
        
        <a href="#" class="btn btn-primary">Voeg planning toe</a>
    </div>

@include('layouts.error')
@endsection

@section('page_specific_scripts')
<!--    <script>CKEDITOR.replace( 'listOfPlanningen' );</script>-->
@endsection
