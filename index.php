<?php

    class Movie {

        private string $title;
        private int $release;
        private string $genre;

        public function __construct(string $title, int $release, string $genre) {
            $this->title = $title;
            $this->release = $release;
            $this->setGenre($genre); 
        }

        public function getInfo(): string {
            return "Title: " . $this->title . ", Release Year: " . $this->release . ", Genre: " . $this->genre;
        }

        public function setGenre(string $genre): void {
            $allowedGenres = ["Horror", "Sci-Fi", "Drama", "Comedy", "Action"];
            if (!in_array($genre, $allowedGenres)) {
                throw new Exception("Genre not allowed. Allowed genres are: " . implode(", ", $allowedGenres) . ".");
            }
            $this->genre = $genre;
        }
    }

    try {
        $movie1 = new Movie("Scream", 1996, "Horror");
        $movie2 = new Movie("Alien", 1979, "Sci-Fi");

        echo $movie1->getInfo() . "<br>";
        echo $movie2->getInfo() . "<br>";
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }


    // Gestione dell'exception con genere non permesso
    try {
        $movie3 = new Movie("10 Things I Hate About You", 1999, "Romance");
        echo $movie3->getInfo() . "<br>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }

?>