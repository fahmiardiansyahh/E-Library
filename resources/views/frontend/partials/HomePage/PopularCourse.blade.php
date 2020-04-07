<div class="popular_courses">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Our Popular Books</h2>
              <p>
                Most Popular Books Here
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">

            @foreach($book as $books)

              <div class="single_course">
                <div class="course_head">
                  <img class="img-fluid" src="{{ $books->getCover() }}" alt="" />
                </div>
                <div class="course_content">
                  <span class="price">{{ $books->qty }}</span>
                  <span class="tag mb-4 d-inline-block">Free</span>
                  <h4 class="mb-3">
                    <a href="#">{{ Str::substr($books->title , 0 ,10) }}</a>
                  </h4>
                  <p>
                   {{ Str::substr($books->description , 0 ,30) }}
                  </p>
                  <div
                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                  >
                    <div class="authr_meta">
                      <img src="img/courses/author1.png" alt="" />
                      <span class="d-inline-block ml-2"> <i class="ti-user mr-2"></i>{{ $books->author->nama }}</span>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach

              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>