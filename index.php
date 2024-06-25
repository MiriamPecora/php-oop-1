<?php

class Movie {

    private string $title;
    private int $release;
    private array $genres;

    public function __construct(string $title, int $release, array $genres) {
        $this->title = $title;
        $this->release = $release;
        $this->setGenres($genres); 
    }

    public function getInfo(): string {
        return "Title: " . $this->title . ", Release Year: " . $this->release . ", Genres: " . implode(", ", $this->genres);
    }

    public function setGenres(array $genres): void {
        $allowedGenres = ["Horror", "Sci-Fi", "Drama", "Comedy", "Action"];
        foreach ($genres as $genre) {
            if (!in_array($genre, $allowedGenres)) {
                throw new Exception("Genre not allowed. Allowed genres are: " . implode(", ", $allowedGenres) . ".");
            }
        }
        $this->genres = $genres;
    }

    public function addGenre(string $genre): void {
        $allowedGenres = ["Horror", "Sci-Fi", "Drama", "Comedy", "Action"];
        if (!in_array($genre, $allowedGenres)) {
            throw new Exception("Genre not allowed. Allowed genres are: " . implode(", ", $allowedGenres) . ".");
        }
        if (!in_array($genre, $this->genres)) {
            $this->genres[] = $genre;
        }
    }
}

try {
    $movie1 = new Movie("Scream", 1996, ["Horror"]);
    $movie2 = new Movie("Alien", 1979, ["Sci-Fi", "Horror"]);

    echo $movie2->getInfo() . "<br>";

    // Gestione aggiunta di un nuovo genere ad un film
    $movie1->addGenre("Action");
    echo $movie1->getInfo() . "<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>"; 
}

try {
    $movie3 = new Movie("10 Things I Hate About You", 1999, ["Romance"]);
    echo $movie3->getInfo() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

?>