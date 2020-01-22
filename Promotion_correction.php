<?php

    include("Student.php");

    Class Promotion
    {
        public $students;

        /**
         * Define the number of students
         *
         * @var int
         */
        public $countStudent;

        /**
         * Define the number of women
         *
         * @var int
         */
        public $countWomen;

        /**
         * Define the number of men
         *
         * @var int
         */
        public $countMen;

        /**
         * Define the number of ops
         *
         * @var int
         */
        public $countOps;

        /**
         * Define the number of dev
         *
         * @var int
         */
        public $countDev;

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
            $this->countStudent = $this->countStudents();
            $this->countWomen = $this->countWomen();
            $this->countMen = $this->countMen();
            $this->countOps = $this->countOps();
            $this->countDev = $this->countDev();
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
        private function countWomen(): int
        {
            return $this->countGenre("F");
        }

        /**
         * Method which calculates the number of men in a promo
         *
         * @return integer
         */
        private function countMen(): int
        {
            return $this->countGenre();
        }

        /**
         * Method which return the number of student by sex
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
         * @return Float
         */
        public function percentageWomen(): Float
        {
            return $this->countWomen * 100 / $this->countStudent;
        }

        /**
         * Method which calculates the percentage of men in a promo
         *
         * @return Float
         */
        public function percentageMen(): Float
        {
            return $this->countMen * 100 / $this->countStudent;
        }

        /**
         * Method which calculates the number of OPS in a promo
         *
         * @return integer
         */
        private function countOps(): int
        {
            return $this->countSpecialty("OPS");
        }

        /**
         * Method which calculates the number of DEV in a promo
         *
         * @return integer
         */
        private function countDev(): int
        {
            return $this->countSpecialty();
        }  

        /**
         * Method which return the number of student by specialty
         *
         * @param String $specialty
         * @return integer
         */
        private function countSpecialty(String $specialty = "DEV"): int
        {
            $cpt = 0;
            foreach($this->students as $student){
                if($specialty == "DEV"){
                    if($student->isDev()){
                        $cpt++;
                    }
                } elseif ($specialty == "OPS"){
                    if(!$student->isDev()){
                        $cpt++;
                    }
                }
            }
            return $cpt;
        }

        /**
         * Method which calculates the percentage of Ops in a promo
         *
         * @return integer
         */
        public function percentageOps(): int
        {
            return $this->countOps * 100 / $this->countStudent;
        }

        /**
         * Method which calculates the percentage of Dev in a promo
         *
         * @return integer
         */
        public function percentageDev(): int
        {
            return $this->countDev * 100 / $this->countStudent;
        }

        /**
         * Method which calculates the average of the promo
         *
         * @return Float
         */
        public function promotionAverage(): Float
        {
            $total = 0;
            foreach($this->students as $student){
                $total += $student->marksAverage;
            }
            return $total / $this->countStudent;
        }


        // nombre d'élèves ayant uniquement le prénom contenant la lettre "u"
        // nombre d'élèves nés avant 1999
        // nombre d'élèves nés après 2001
        // ajouter un étudiant dans la promotion
        // modifier un étudiant dans la promotion
        // supprimer un étudiant dans la promotion

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
echo "<br>Nombre de femmes : ".$p->countWomen;
echo "<br>Nombre d'hommes : ".$p->countMen;
echo "<br>Nombre de femmes (%) : ".$p->percentageWomen();
echo "<br>Nombre d'hommes (%) : ".$p->percentageMen();
echo "<br>Nombre de Ops : ".$p->countOps;
echo "<br>Nombre de Dev : ".$p->countDev;
echo "<br>Nombre de Ops (%) : ".$p->percentageOps();
echo "<br>Nombre de Dev (%) : ".$p->percentageDev();
echo "<br>Moyenne de la promo (%) : ".$p->promotionAverage();






?>