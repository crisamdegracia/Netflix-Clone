<?php 
class CategoryContainers {

    private $con;
    private $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

	public function showAllCategories() {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='previewCategories'>";

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // $html .= $this->getCategoryHtml($row, null, true, true);
			$row['name'];
		}

        return $html . "</div>";
    }


}
?>