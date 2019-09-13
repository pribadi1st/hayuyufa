@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <img 
            src="https://static.wixstatic.com/media/nsplsh_51333642764c47644f4167~mv2_d_6000_4000_s_4_2.jpg/v1/fill/w_1880,h_890,al_c,q_85,usm_0.66_1.00_0.01/Image%20by%20Hanson%20Lu.webp" 
            alt="homepage"
            width="100%"
            height="445"
        />

        <p class="welcome-text">
            Welcome to Chinese Teak
        </p>

        <div class="home-content">
            <p class="header-content">About</h2>
            <p class="sub-header">An Engaging Learning Resource</h3>
            <p class="description">
                We are a leading online learning platform, delivering access to our high quality videos to everyone with an internet connection.
                Our content provides engaging and interesting learning opportunities, guiding viewers to identify their strengths and fill in their learning gaps.
                When you participate in our Language Course, you’re joining a global community of like-minded individuals looking to expand their understanding.
            </p>
        </div>

        <div class="fill-space"/>
    </div>
@endsection

<style>
.container {
    width: 980px;
    margin:auto;
    margin-top: 60px;
}

.container > .welcome-text {
    font: normal normal normal 72px/1.25em 'courier new',courier-ps-w01,courier-ps-w02,courier-ps-w10,monospace;
    font-size: 55px;
    text-align: center;   
    margin: 68px 0;
}

.container > .home-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.container > .home-content > .header-content {
    text-align: center;
    line-height: 1.35em;
    font: normal normal normal 40px/1.35em 'courier new',courier-ps-w01,courier-ps-w02,courier-ps-w10,monospace
}

.container > .home-content > .sub-header {
    text-align: center;
    line-height: 1.75em;
    font: normal normal normal 18px/1.75em raleway,sans-serif;
}

.container > .home-content > description {
    text-align: center;
    line-height: 1.875em;
    font: normal normal normal 15px/1.875em raleway,sans-serif
}
</style>