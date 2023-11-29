<?php
class Portfolio {
    private $portfolioID;
    private $name;
    private $description;
    private $skills;
    private $templateSelection;
    private $experience;

    public function __construct($portfolioID, $name, $description, $skills, $templateSelection, $experience) {
        $this->portfolioID = $portfolioID;
        $this->name = $name;
        $this->description = $description;
        $this->skills = $skills;
        $this->templateSelection = $templateSelection;
        $this->experience = $experience;
    }

    public function getPortfolioID(): int {
        return $this->portfolioID;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getSkills(): string {
        return $this->skills;
    }

    public function getExperience(): string {
        return $this->experience;
    }

    public function getTemplateSelection(): int {
        return $this->templateSelection;
    }

    public function updateName($newName) {
        $this->name = $newName;
    }

    public function updateSkills($newSkills) {
        $this->skills = $newSkills;
    }

    public function updateExperience($newExperience) {
        $this->experience = $newExperience;
    }

    public function updateTemplateSelection($newTemplateSelection) {
        $this->templateSelection = $newTemplateSelection;
    }
}

?>