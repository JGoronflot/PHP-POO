<?php

/**
 * Create Student Class
 * 
 * @author Jimmy GORONFLOT (with the help of Kévin NIEL)
 */
Class Student
{
    //Create attributs

    /**
     * Student first name
     */
    public $firstName;

    /**
     * Student last name
     */
    public $lastName;

    /**
     * Student birth date
     */
    public $birthDate;

    /**
     * Student sex
     */
    public $sex;

    /**
     * Student speciality (DEV/OPS)
     */
    public $speciality;

    /**
     * Student marks
     */
    public $marks;

    /**
     * Student marks average
     */
    public $marksAverage;

    /**
     * Student age
     */
    public $age;

    // Définir un constructeur (on peut l'écrire en 1 ligne mais le PHP
    // a une convention d'écriture qui limite le nombre de caractère par 
    // ligne à 128)
    // Pour l'autocomplétion des commentaires, sur VS Code, aller dans le marketplace et installer l'extension "PHP DocBlocker"
    /**
     * Construct init
     *
     * @param String $firstName
     * @param String $lastName
     * @param String $birthDate
     * @param String $sex
     * @param String $speciality
     * @param Array $marks
     * @param Float $marksAverage
     */
    public function __construct(
        String $firstName,
        String $lastName,
        String $birthDate,
        String $sex,
        String $speciality,
        Array $marks
    ) {
        // On demande d'affecter la valeur de la variable "firstName" passée
        // en paramètre, à l'attribut "firstName" de la classe. Le "$this' permet
        // de faire référence à la classe courante (et donc un élément qui s'y trouve)
        $this->firstName = $firstName;
        // On fait la même chose pour tous les paramètres
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->sex = $sex;
        $this->speciality = $speciality;
        $this->marks = $marks;
        // On calcule ici la moyenne de l'étudiant, et on l'effecte à
        // l'attribut "marksAverage" paour ne pas avoir à refaire le calcul
        // de la moyenne plusieurs fois
        $this->average();
        // On défini l'âge de l'étudient grâce à sa date de naissance
        $this->age = $this->getAge();
    }

    /**
     * Method which calculate the average of the Student Marks
     * based on the "marks" attribute abd set it to the marksAverage
     * attribute
     * 
     * @return void
     */
    public function average(): void
    {
        $this->marksAverage = array_sum($this->marks) / count($this->marks);
    }

    /**
     * Method which add a mark to the "marks" attribute array
     *
     * @param int $markToAdd
     * @return void
     */
    public function addMark(int $markToAdd): void
    {
        // Adding the new mark to new array
        $this->marks[] = $markToAdd;
        // Updating the marksAverage
        $this->average();
    }

    /**
     * Method which remove a mark on the "marks" attribute array
     *
     * @param int $index
     * @return void
     */
    public function removeMark(int $index): void
    {
        // Remove the mark on array
        unset($this->marks[$index]);
        // Réoraganiser les valeurs
        $this->marks = array_values($this->marks);
        // Réinitialiser la moyenne
        $this->average();
    }

    /**
     * Method which returns whether an index exists in the marks array
     *
     * @param integer $index
     * @return Bool
     */
    private function checkIndex(int $index): Bool
    {
        if(isset($this->marks[$index])
            && !empty($this->marks[$index])
            && !is_null($this->marks[$index])
        ) {
            return True;
        }
        return False;
    }

    /**
     * Method which edit marks
     *
     * @param integer $index
     * @param integer $markToAdd
     * @return void
     */
    public function editMark(int $index, int $markToAdd): void
    {
        if($this->checkIndex($index)){
            // Remplacer la valeur par une autre
            $this->marks[$index] = $markToAdd;
            // Réinitialiser la moyenne
            $this->average();
        }
    }

    /**
     * Method which get Age from birth date
     *
     * @return integer
     */
    public function getAge(): int
    {
        $currentDate = new DateTime();
        $dateBirth = date_create_from_format("d/m/Y", $this->birthDate);
        $age = $dateBirth->diff($currentDate)->y;
        return $age;
    }

    /**
     * Method returning true if the current student
     * is a male. False if the student is a women
     *
     * @return boolean
     */
    public function isMale(): bool
    {
        if($this->sex == "H"){
            return True;
        }
        return False;
    }

    
}

//On fait nos tests ici
// $st1 = new Student("Kévin", "Niel", "01/01/2000", "H", "DEV", [0, 0, 1, 0]);

// var_dump($st1);

// Afficher uniquement le prénom de l'étudient
// echo $st1->firstName;

// Afficher la moyenne des notes
// echo("<br>");
// echo $st1->average();

// Ajout d'une note et affichage du tableau de notes
// $st1->addMark(10);
// var_dump($st1);

// Supprimer une note et affichage du tableau de notes
// $st1->removeMark(10);
// var_dump($st1);

// Modifier une note et affichage du tableau de notes
// $st1->editMark(0, 11);
// var_dump($st1);

// var_dump($st1->getAge());

?>
