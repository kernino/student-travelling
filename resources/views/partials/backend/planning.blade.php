@extends('partials.backend.index')

@section('container')
    <div class="htmlContent" style="margin-bottom: 20px;">
        <h1 >{{ $aTripData[0]->name }}</h1>
        <p class="date">{{$aTripData[0]->start_date }} - {{$aTripData[0]->end_date }}</p>
        
        <table class="table-borderless">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Klik op het kaartje om de planning te wijzigen.</th>
                </tr>
            </thead>
            
            <tbody>
                @php
                    $i = 1;
                @endphp
                
                @foreach ($aPlanningen as $daysplannings)
                    
                    
                    @if ($i % 2 != 0 )			
                        <tr>
                        <td>					  
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">dag {{ $i }} - {{$daysplannings->name}}</h5>
                                    <p class="card-text"><b style="font-size: 18px;">{{$daysplannings->end_location}}</b> <br> {{$daysplannings->date}} <br> {{$daysplannings->highlight}}</p>
                                    <a href="{{ route('planningWijzig',[ "id" => $daysplannings->day_planning_id, "dagnr" => $i]) }}" class="btn btn-primary">Wijzig planning</a>
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
                            <div class="card card-right" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">dag {{ $i }} - {{$daysplannings->name}}</h5>
                                    <p class="card-text"><b style="font-size: 18px;">{{$daysplannings->end_location}}</b> <br> {{$daysplannings->date}} <br> {{$daysplannings->highlight}}</p>
                                    <a href="{{ route('planningWijzig',[ "id" => $daysplannings->day_planning_id, "dagnr" => $i]) }}" class="btn btn-primary">Wijzig planning</a>
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
        
        <a href="{{ route('planningWijzig', [ "id" => 0, "dagnr" => 0]) }}}}" class="btn btn-primary">Voeg planning toe</a>
    </div>

@include('layouts.error')
@endsection

@section('page_specific_scripts')
<!--    <script>CKEDITOR.replace( 'listOfPlanningen' );</script>-->
@endsection
