<?php



?>
  <!-- SEARCH FORM -->
  <div class="well">
    <form id="search-form" class="form" method="GET" action="" novalidate="">

          <!-- <div class=" btn-group pull-right btn-lg" data-toggle="buttons-radio">
              <button class="btn active">All</button>
              <button class="btn">Movies</button>
              <button class="btn">Actors</button>
              <button class="btn">Directors</button>
            </div> -->

            <div class="input-group text-center">
              <!-- SEARCH-BOX -->
              <input id="search-box" class="form-control input-lg" type="text" placeholder="What are you looking for?"  name="search-box" required>

              <span class="input-group-btn">
                <input class="btn btn-lg btn-primary" type="submit" value="Search" name="search-button" id="search-button">
              </span>
            </div>

            <br>
            <!-- SEARCH OPTIONS -->
            <div align="center">
              <label class="radio-inline">Search: </label>  

              <label class="radio-inline"> 
              <input type="radio" name="search-option" value="0" checked='checked' /> All
              </label>
              <label class="radio-inline">
                <input type="radio" name="search-option" value="1" /> Movies
              </label>
              <label class="radio-inline">
                <input type="radio" name="search-option" value="2" /> Actors
              </label>
              <label class="radio-inline">
                <input type="radio" name="search-option" value="3" /> Directors
              </label>
              <label class="radio-inline">
                <input type="radio" name="search-option" value="4" /> Release Year
              </label>
            </div>

            <!--<input type="hidden" value="searchForm-submit" name="search">-->
          </form>
        </div><!--  END OF SEARCH FORM -->
