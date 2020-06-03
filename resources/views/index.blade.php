<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('css/accueil.css')}}"/>
</head>

<body>
    <div class="bck-overlay"></div>
        <div class="teaser-content">
            <div class="logo-container">
                <img class="logo" src="../images/logo.svg">
            </div>
            <div class="title-container">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="infos-container"> 
                        <div class="contact-infos">
                            <h4 > Vous êtes membre du 15</h4>
                            <div class="">
                            <a class="btn btn-info" href="/login"> Login</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                        <div class="infos-container"> 
                                <div class="contact-infos">
                                    <h4> Vous n'êtes pas membre du 15</h4>
                                <div class="">
                                <a class="btn btn-info" href="{{ route('demandes.create') }}"> Reserver</a> 
                    
                                </div> 
                                </div>
                        </div>
                </div>
            </div>
        </div>
</body>