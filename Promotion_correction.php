<?php

    include("Student.php");

    Class Promotion
    {
        public $students;

        // constructeur
        /**
         * Construct init
         *
         * @param Array $students
         */
        public function __construct(
            Array $students
        ) {
            $this->students = $students;
        }

        /**
         * Method which calculates the number of students in a promo
         *
         * @return integer
         */
        public function countStudents(): int
        {
            return count($this->students);
        }

        /**
         * Method which calculates the number of women in a promo
         *
         * @return integer
         */
        public function countWomen(): int
        {
            return $this->countGenre("F");
        }

        /**
         * Method which calculates the number of men in a promo
         *
         * @return integer
         */
        public function countMen(): int
        {
            return $this->countGenre();
        }

        /**
         * Method which return the number of student by sexP
         *
         * @param String $genre
         * @return integer
         */
        private function countGenre(String $genre = "H"): int
        {
            $cpt = 0;
            foreach($this->students as $student){
                if($genre == "H"){
                    if($student->isMale()){
                        $cpt++;
                    }
                } elseif ($genre == "F"){
                    if(!$student->isMale()){
                        $cpt++;
                    }
                }
            }
            return $cpt;
        }

        /**
         * Method which calculates the percentage of women in a promo
         *
         * @return integer
         */
        public function percentageWomen(): int
        {
            return $this->countWomen() * 100 / $this->countStudents();
        }

        /**
         * Method which calculates the percentage of men in a promo
         *
         * @return integer
         */
        public function percentageMen(): int
        {
            return $this->countMen() * 100 / $this->countStudents();
        }




    }

$students = [
    new Student("Kévin", "Niel", "01/01/2003", "H", "DEV", [0, 10, 1, 0]),
    new Student("Enzo", "Daboss", "01/01/1995", "H", "DEV", [0, 0, 1, 0]),
    new Student("Quentin", "Dafirst", "01/01/2000", "H", "DEV", [5, 0, 1, 0]),
    new Student("Eric", "Estmalade", "01/01/1984", "H", "DEV", [0, 18, 1, 4]),
    new Student("Charles", "Estenretard", "01/01/2010", "F", "OPS", [0, 3, 1, 0]),
];

$p = new Promotion($students);
echo "Nombre d'étudiants : ".$p->countStudents();
echo "<br>Nombre de femmes : ".$p->countWomen();
echo "<br>Nombre d'hommes : ".$p->countMen();
echo "<br>Nombre de femmes (%) : ".$p->percentageWomen();
echo "<br>Nombre d'hommes (%) : ".$p->percentageMen();
?>