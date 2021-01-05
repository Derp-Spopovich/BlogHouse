@extends('layouts.app')
@section('index')

{{-- carousel start --}}
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/indeximg/indexphoto1.jpg" alt="" class="d-block w-100">
      {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg> --}}
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Blog House</h1>
          <p>Create a unique and beautiful blog. It's easy and free</p>
          <p><a class="btn btn-lg btn-primary" href="/register" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/indeximg/indexphoto2.jpg" alt="" class="d-block w-100"> 
      {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg> --}}
      <div class="container">
        <div class="carousel-caption">
          <h1>Publish your passions, your way</h1>
          <h5>“What you do after you create your content is what truly counts.”</h5>
          <p><a class="btn btn-lg btn-primary" href="/about" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/indeximg/indexphoto3.jpg" alt="" class="d-block w-100">
      {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg> --}}
      <div class="container">
        <div class="carousel-caption text-right text-dark">
          <h1>One more for good measure.</h1>
          <h5>"The first step in blogging is not writing them but reading them"</h5>
          <p><a class="btn btn-lg btn-primary" href="/posts" role="button">Browse Blogs</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
{{-- end of carousel --}}

{{-- start of cards --}}
    <div class="container text-muted">
    <!-- cards -->
     <div class="row">
       <div class="col-md-6 col-lg-3">
         <div class="card">
          <img src="img/album1.jpg" alt="album icon" class="card-img-top">
           <div class="card-body">
             <h3 class="card-title">Hang Onto Your Memories</h3>
             <p>Save the moments that matter. Blog House lets you store posts and photos.</p>
             {{-- <p><a class="btn btn-secondary" href="#" role="button">Signup now! &raquo;</a></p> --}}
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-3">
         <div class="card">
          <img src="img/publish.jpg" alt="publish icon" class="card-img-top">
           <div class="card-body">
             <h3 class="card-title">Made For <strong>Publishers</strong></h3>
             <p>Publish on your terms. You control the content, the experience, and everything in between. You're in charge.</p>
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-3">
         <div class="card">
          <img src="img/socials.jpg" alt="pizza" class="card-img-top">
           <div class="card-body">
             <h3 class="card-title">Promote Your Contents</h3>
             <p>Wether your on facebook, youtube or any other platforms. You can share your contents here.</p>
           </div>
         </div>
       </div>
       <div class="col-md-6 col-lg-3">
         <div class="card">
          <img src="img/create.jpg" alt="pizza" class="card-img-top">
           <div class="card-body">
             <h3 class="card-title">Create Your Own Beautiful Blog</h3>
             <p>Start Now <a class="btn btn-secondary" href="/posts/create" role="button">Create blog &raquo;</a> </p>
           </div>
         </div>
       </div>
     </div>
{{-- end of cards --}}

     <h2 class="display-4 text-center py-5 my-4">Read and share new perspectives on just about any topic. Everyone’s welcome.</h2>

     
        <nav class="nav justify-content-center nav-pills flex-column flex-md-row">
          <p class="px-5">Follow us</p>
          <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook mx-1">Facebook</a>
          <a href="https://twitter.com/" target="_blank" class="fa fa-twitter mx-1">twittah</a>
          <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram mx-1">Instagram</a>
          <a href="https://www.tumblr.com/" target="_blank" class="fa fa-tumblr mx-1">Tumblr</a>
          {{-- <a href="#derp" class="nav-link active" data-toggle="tab">Derp Spopovich</a>
          <a href="#zery" class="nav-link" data-toggle="tab">Zery Islet</a>
          <a href="#ninja" class="nav-link" data-toggle="tab">The Net Ninja</a>
          <a href="#avenger" class="nav-link" data-toggle="tab">Angular Avenger</a> --}}
        </nav>

        {{-- <div class="tab-content py-5">
          <div class="tab-pane active" id="derp">
            <h3>Derp Spopovich</h3>
            <p>Enjoy a protein-packed serving of bacon, beef, ham, italian sausage, pepperoni and seasoned pork.</p>
          </div>
          <div class="tab-pane" id="zery">
            <h3>Zery Islet</h3>
            <p>Enjoy a protein-packed serving of bacon, beef, ham, italian sausage, pepperoni and seasoned pork.</p>
          </div>
          <div class="tab-pane" id="ninja">
            <h3>The Net Ninja</h3>
            <p>Enjoy a protein-packed serving of bacon, beef, ham, italian sausage, pepperoni and seasoned pork.</p>
          </div>
          <div class="tab-pane" id="avenger">
            <h3>Angular Avenger</h3>
            <p>Enjoy a protein-packed serving of bacon, beef, ham, italian sausage, pepperoni and seasoned pork.</p>
          </div>
        </div>
    </div> --}}
@endsection
