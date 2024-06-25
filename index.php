<?php

    class Genre {
        private string $name;

        public function __construct(string $name) {
            $this->name = $name;
        }

        public function getName(): string {
            return $this->name;
        }
    }

    class Actor {
        private string $name;

        public function __construct(string $name) {
            $this->name = $name;
        }

        public function getName(): string {
            return $this->name;
        }
    }

    class Movie {

        private static int $movieCount = 0;
        private string $title;
        private int $release;
        private array $genres;
        private array $actors;

        public function __construct(string $title, int $release, array $genres, array $actors) {
            $this->title = $title;
            $this->release = $release;
            $this->setGenres($genres);
            $this->setActors($actors);

            self::$movieCount++;
        }

        // ***** Metodo statico *****
        public static function getMovieCount(): int {
            return self::$movieCount;
        }

        public function getInfo(): string {
            $genreNames = array_map(fn($genre) => $genre?->getName(), $this->genres);
            $actorNames = array_map(fn($actor) => $actor?->getName(), $this->actors);
            return 
            "Title: " . $this->title 
            . ", Release Year: " . $this->release 
            . ", Genres: " . implode(", ", array_filter($genreNames))
            . ", Actors: " . implode(", ", array_filter($actorNames));
        }

        // ***** Setter generi e attori *****

        public function setGenres(array $genres): void {
            $this->genres = [];
            foreach ($genres as $genre) {
                if ($genre instanceof Genre) {
                    $this->genres[] = $genre;
                } else {
                    throw new Exception("Invalid 'genre' object provided.");
                }
            }
        }

        public function setActors(array $actors): void {
            $this->actors = [];
            foreach ($actors as $actor) {
                if ($actor instanceof Actor) {
                    $this->actors[] = $actor;
                } else {
                    throw new Exception("Invalid 'actor' object provided.");
                }
            }
        }

        // ***** Metodi per aggiungere nuovi generi e attori *****

        public function addGenre(Genre $genre): void {
            if (!in_array($genre, $this->genres)) {
                $this->genres[] = $genre;
            }
        }

        public function addActor(Actor $actor): void {
            if (!in_array($actor, $this->actors)) {
                $this->actors[] = $actor;
            }
        }
    }

    try {

        // echo "Numero totale di film creati: " . Movie::getMovieCount() . "<br>";

        // **** Aggiungo attori e generi alle rispettive classi

        $genre1 = new Genre("Horror");
        $genre2 = new Genre("Sci-Fi");
        $genre3 = new Genre("Comedy");
    
        $actor1 = new Actor("Neve Campbell");
        $actor2 = new Actor("Courteney Cox");
        $actor3 = new Actor("Sigourney Weaver");
        $actor4 = new Actor("Tom Skerritt");

        $movie1 = new Movie("Scream", 1996, [$genre1, $genre2], [$actor1, $actor2]);
        $movie2 = new Movie("Alien", 1979, [$genre2, $genre1], [$actor3, $actor4]);

        echo $movie2->getInfo() . "<br>";

        // Gestione aggiunta di un nuovo genere e attore ad un film
        $genre4 = new Genre("Action");
        $actor5 = new Actor("Drew Barrymore");
    
        $movie1->addGenre($genre4);
        $movie1->addActor($actor5);

        echo $movie1->getInfo() . "<br>";

        echo "Movies found: " . Movie::getMovieCount() . "<br>";

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>"; 
    }

?>