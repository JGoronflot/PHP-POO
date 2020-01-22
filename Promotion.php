<?php
    /**
     * File initialization Student.php
     */
    include("Student.php");

    /**
     * Create Promotion Class
     * 
     * @author Jimmy GORONFLOT
     */
    Class Promotion
    {
        //Create attributs
    
        /**
         * Students table
         */
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

        /**
         * Method which calculates the number of students by specialty (Dev)
         *
         * @return integer
         */
        public function DevByPromo(): int
        {
            $nb_dev = 0;
            foreach($this->students as $value){
                if($value->speciality == "DEV"){
                    $nb_dev +=1; 
                }
            }
            return $nb_dev;
        }

        /**
         * Method which calculates the number of students by specialty (Ops)
         *
         * @return integer
         */
        public function OpsByPromo(): int
        {
            $nbOps = 0;
            foreach($this->students as $value){
                if($value->speciality == "OPS"){
                    $nbOps +=1; 
                }
            }
            return $nbOps;
        }
        
        /**
         * Method which calculates the percentage of students by specialty (Dev)
         *
         * @return integer
         */
        public function DevPourcentageByPromo(): int
        {
            $nb_dev = 0;
            foreach($this->students as $value){
                if($value->speciality == "DEV"){
                    $nb_dev +=1; 
                }
            }
            $pourcentage_dev = $nb_dev * 100 / count($this->students);
            return $pourcentage_dev;
        }
        
        /**
         * Method which calculates the percentage of students by specialty (Dev)
         *
         * @return integer
         */
        public function OpsPourcentageByPromo(): int
        {
            $nbOps = 0;
            foreach($this->students as $value){
                if($value->speciality == "OPS"){
                    $nbOps +=1; 
                }
            }
            $pourcentageOps = $nbOps * 100 / count($this->students);
            return $pourcentageOps;
        }

        /**
         * Method which calculates the average of the promo
         *
         * @return Float
         */
        public function averageByPromo(): Float
        {
            $averageTab = [];
            foreach($this->students as $value){
                foreach($value->marks as $valueTab){
                    $averageTab[] = $valueTab;
                }
            }
            $marksAverage = array_sum($averageTab) / count($averageTab);
            return $marksAverage;
        }

        /**
         * Method which calculate the worst average
         *
         * @return Student
         */
        public function minStudient(): Student
        {
            $averageMin = 30;
            $minStu = null;
            foreach($this->students as $value){
                if($value->marksAverage < $averageMin){
                    $averageMin = $value->average();
                    $minStu = $value;
                }
            }
            return $minStu;
        }

        /**
         * Method which calculate the better average
         *
         * @return Student
         */
        public function maxStudient(): Student
        {
            $averageMax = 0;
            $maxStu = null;
            foreach($this->students as $value){
                if($value->marksAverage > $averageMax){
                    $averageMax = $value->marksAverage;
                    $maxStu = $value;
                }
            }
            return $maxStu;
        }

        /**
         * Method which calculate the average age
         *
         * @return Student
         */
        public function averageAgeByPromo(): Int
        {
            $averageTab = [];
            foreach($this->students as $value){
                $averageTab[] = $value->getAge();
            }
            $marksAverage = array_sum($averageTab) / count($averageTab);
            return $marksAverage;
        }

        /**
         * Method which calculate the minimum age
         *
         * @return Student
         */
        public function minAge(): Student
        {
            $ageMin = 150;
            $minStu = null;
            foreach($this->students as $value){
                if($value->getAge() < $ageMin){
                    $ageMin = $value->getAge();
                    $minStu = $value;
                }
            }
            return $minStu;
        }

        /**
         * Method which calculate the maximum age
         *
         * @return Student
         */
        public function maxAge(): Student
        {
            $ageMax = 0;
            $maxStu = null;
            foreach($this->students as $value){
                if($value->getAge() > $ageMax){
                    $ageMax = $value->getAge();
                    $maxStu = $value;
                }
            }
            return $maxStu;
        }

        /**
         * Method which returns an array with the students 
         * in alphabetical order
         *
         * @return Array
         */
        public function studentsAtoZ(): Array
        {
            $studentsTab = [];
            foreach($this->students as $value){
                $studentsTab[] = $value->lastName;
                sort($studentsTab);
            }
            return $studentsTab;
        }

        /**
         * Method which returns number of students with a first 
         * or last name containing the letter "a"
         *
         * @return Array
         */
        public function AinName(): Array
        {
            $AinName = 0;
            $ATab = [];
            foreach($this->students as $value){
                if((strpos(strtolower($value->firstName), 'a') !== false)){
                    $ATab[] = $value;
                }
            }
            return $ATab;
        }

        /**
         * Method which returns number of students with a first 
         * and last name containing the letter "u"
         *
         * @return Array
         */
        public function UinName(): Array
        {
            $UinName = 0;
            $UTab = [];
            foreach($this->students as $value){
                if((strpos(strtolower($value->firstName), 'u') !== false) && (strpos(strtolower($value->lastName), 'u') !== false)){
                    $UTab[] = $value;
                }
            }
            return $UTab;
        }

        /**
         * Method which returns number of students born before 1999
         *
         * @return Array
         */ 
        public function Age1999(): Array
        {
            $anneeTab = [];
            foreach($this->students as $value){
                $dateBirth = date("Y", strtotime($value->birthDate));
                if($dateBirth <= 1999){
                    $anneeTab[] = $value;
                }
            }
            return $anneeTab;
        }

        /**
         * Method which returns number of students born after 2002
         *
         * @return Array
         */ 
        public function Age2001(): Array
        {
            $anneeTab = [];
            foreach($this->students as $value){
                $dateBirth = date("Y", strtotime($value->birthDate));
                if($dateBirth >= 2001){
                    $anneeTab[] = $value;
                }
            }
            return $anneeTab;
        }

    }

    
    /**
     * Students initialization
     */
    $students = [
        new Student("Kévin", "Niel", "01/01/2003", "H", "DEV", [0, 10, 1, 0]),
        new Student("Enzo", "Daboss", "01/01/1995", "H", "DEV", [0, 0, 1, 0]),
        new Student("Quentin", "Dafirst", "01/01/2000", "H", "DEV", [5, 0, 1, 0]),
        new Student("Eric", "Estmalade", "01/01/1984", "H", "DEV", [0, 18, 1, 4]),
        new Student("Charles", "Estenratard", "01/01/2010", "F", "OPS", [0, 3, 1, 0]),
    ];

    /**
     * Create promotion
     */
    $studentTest = new Promotion($students);

    /**
     * Show different methods
     */
    echo "Le nombre dans la promo est de ".$studentTest->studentsByPromo()." élèves.";
    echo "<br>Le nombre de fille dans la promo est de ".$studentTest->womenByPromo()." élèves.";
    echo "<br>Le nombre de garçon dans la promo est de ".$studentTest->menByPromo()." élèves.";
    echo "<br>Le pourcentage de fille dans la promo est de ".$studentTest->womenPourcentageByPromo()."%.";
    echo "<br>Le pourcentage de garçon dans la promo est de ".$studentTest->menPourcentageByPromo()."%.";
    echo "<br>Le nombre de DEV dans la promo est de ".$studentTest->devByPromo().".";
    echo "<br>Le nombre de OPS dans la promo est de ".$studentTest->opsByPromo().".";
    echo "<br>Le pourcentage de DEV dans la promo est de ".$studentTest->womenPourcentageByPromo()."%.";
    echo "<br>Le pourcentage de OPS dans la promo est de ".$studentTest->menPourcentageByPromo()."%.";
    echo "<br>La moyenne de la promo est de ".$studentTest->averageByPromo().".";
    echo "<br>Le plus mauvais élève de la promo est ".$studentTest->minStudient()->firstName.".";
    echo "<br>Le meilleur élève de la promo est ".$studentTest->maxStudient()->firstName.".";
    echo "<br>La moyenne d'âge de la promo est de ".$studentTest->averageAgeByPromo()." ans.";
    echo "<br>L'élève le plus jeune de la promo est ".$studentTest->minAge()->firstName.".";
    echo "<br>L'élève le plus âgé de la promo est ".$studentTest->maxAge()->firstName.".";
    echo "<br>Tri élève dans l'ordre alphabétique : ";
    foreach ($studentTest->studentsAtoZ() as $valeur) {
        echo $valeur.", ";
    }
    echo "<br>Élèves ayant un A dans leur prénom ou nom : ";
    foreach ($studentTest->AinName() as $valeur) {
        echo $valeur->firstName.", ";
    }
    echo "<br>Élèves ayant un U dans leur prénom et nom : ";
    foreach ($studentTest->UinName() as $valeur) {
        echo $valeur->firstName.", ";
    }
    echo "<br>Élèves nés avant 1999 : ";
    foreach ($studentTest->Age1999() as $valeur) {
        echo $valeur->firstName.", ";
    }
    echo "<br>Élèves nés après 2001 : ";
    foreach ($studentTest->Age2001() as $valeur) {
        echo $valeur->firstName.", ";
    }
?>