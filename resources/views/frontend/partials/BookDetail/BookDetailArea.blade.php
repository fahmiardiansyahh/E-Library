<section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    @if( session('borrowSuccess') )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session('borrowSuccess') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    @elseif(session('borrowFailed') ) 
                        
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session('borrowFailed') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{ $book->cover }}" alt="" style="height: 341px; width: 730px; background-size: cover;">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Description Of Book {{ $book->title }}</h4>
                        <div class="content">
                            {{ $book->description }}
                        </div>

                        <h4 class="title">Eligibility</h4>
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                            <br>
                            <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea
                            commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum. Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum.
                        </div>
                
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Authors Name</p>
                                <span class="or">{{ $book->author->nama }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Book Fee </p>
                                <span>FREE</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Available Book </p>
                                <span>{{ $book->qty }}</span>
                            </a>
                        </li>
                    </ul>
                    


                    @if(auth()->user()->borrow()->where('books.id', $book->id)->count() > 0)
                   
                    <button class="genric-btn danger radius disable text-uppercase enroll rounded-0 text-danger">You Haved Borrowed</button>


                    @else

                     <form action="{{ route('book.borrow' , $book->id) }}" method="POST">
                    
                    @csrf

                    <button type="submit" class="primary-btn text-uppercase enroll rounded-0 text-white">Borrow</button>

                    </form>
                    
                    @endif
                </div>
            </div>
        </div>
    </section>