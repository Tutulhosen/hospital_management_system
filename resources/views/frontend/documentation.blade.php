@extends('frontend.layout.app')

@section('main-content')
<br><br>
<div class="contain">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1 style="background-color: rgb(45, 23, 238); color:aliceblue" class="text-center">This is a practice project with Laravel Framework</h1>
            <h3 style="background-color: black; color:aliceblue" class="text-center">A Hospital management system</h3>
            <p style="color: rgb(8, 253, 241); background-color:black" class="text-center">In the front page, the doctor and the appoinment part is developed. Most of the developing part is on backend</p>
            <br><br>
            <h3 style="color:brown" class="text-center">In backend</h3>
            <ul style="color: rgb(187, 15, 144)">
                <li>There have a default data in database. you can access admin dashboard with Email:super@admin.com and  password:123456789</li>
                <li>You can create some necessary data from dashboard and also can add new adminuser</li>
                <li>admin user can setup their profile with login and every user have a default password(123456789)</li>


            </ul>
            <br><br>
            <h3 style="color:brown" class="text-center">From front page</h3>
            <ul style="color: rgb(187, 15, 144)">
                <li>Doctor and patient can register </li>
                <li>doctor can access a dashboard and setup their profile</li>
                <li>Anyone can make an appoinment</li>
                <li>Register patient can see their appoinment status </li>
            </ul>
            <br><br>
            <h2 style="background-color: rgb(45, 23, 238); color:aliceblue" class="text-center">Appoinment is accepted or rejected or delete by an adminuser. Doctor can see their appoinment in their dashboard</h2>

        </div>
    </div>
</div>
<br><br>

@endsection