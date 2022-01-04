@extends('layout.app')

@section('content')

<h1 class="text-center pt-3 font-weight-bold">Hello<span class="text-danger">  Admin </span> </h1>

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-5 px-5">

        

            <div id="gridDiv">

                <div class="cardsClass bg-info">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalCoins }}</h2>
                            <p class="cardTitle">Total Coins</p>
                        </div>
                        <div class="col-6">
                            <img src="{{asset('webimages/dollar.png')}}"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>


                <div class="cardsClass bg-success">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalUsers }}</h2>
                            <p class="cardTitle">Total Users</p>
                        </div>
                        <div class="col-6">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/User_Avatar_2.png"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>


                <div class="cardsClass bg-warning">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalInfluencers }}</h2>
                            <p class="cardTitle">Total Influencers</p>
                        </div>
                        <div class="col-6">
                            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>


                <div class="cardsClass bg-dark">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalVoters }}</h2>
                            <p class="cardTitle">Total Voters</p>
                        </div>
                        <div class="col-6">
                            <img src="{{asset('webimages/dollar.png')}}"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>


                <div class="cardsClass bg-primary">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalCoinOwners }}</h2>
                            <p class="cardTitle">Total Coin Owners</p>
                        </div>
                        <div class="col-6">
                            <img src="{{asset('webimages/dollar.png')}}"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>


                <div class="cardsClass bg-danger">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="cardAmount">{{ $totalVotes }}</h2>
                            <p class="cardTitle">Total Votes</p>
                        </div>
                        <div class="col-6">
                            <img src="{{asset('webimages/dollar.png')}}"
                                alt="" class="cardImage">
                        </div>
                    </div>
                </div>



            </div>




        </div>
    </div>
</div>

<script>
    $(".home").addClass("activated");
</script>
@endsection
