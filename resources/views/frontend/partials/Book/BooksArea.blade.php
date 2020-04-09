<section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Books</h2>
              <p>
                Choose A Book For Borrowing!
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center d-flex align-items-center">

        
        @foreach($book as $books)


          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="{{ $books->getCover() }}" alt="books-image" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>{{ Str::substr($books->author->nama , 0 , 10) }}</h4>
              <p class="designation">Jumlah {{ $books->qty }}</p>
              <div class="mb-4">
                <p>
                  {{ Str::substr($books->description , 0 , 35) }}
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <button type="button" class="genric-btn primary circle arrow">Detail</button>
              </div>
            </div>
          </div>

        @endforeach
          
          {{ $book->links() }}

        </div>
      </div>
</section>