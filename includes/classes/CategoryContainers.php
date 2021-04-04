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

        //
        $html = "<div class='previewCategories'>";

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // sabi sa subt the row will contain the next row in the data every time it iterate
            // so everytime this while loop goes around row is going to contain the next row data from this query
            // Basic - dapat alam ko na un dba.
            // 1st arg, the data, 2nd Title, 3rd TvShow, 4th Movies 
            $html .= $this->getCategoryHtml($row, null, true, true);
		echo $row['name'];
		}

        return $html . "</div>";
    }

    
    // from the function word getCategoryHTML
    //
    private function getCategoryHtml($sqlData, $title, $tvShows, $movies) {
        $categoryId = $sqlData["id"];
        $title = $title == null ? $sqlData["name"] : $title;


        if ($tvShows && $movies) {
            //ung 30 dito is ung limit, na naka set sa EntityProvider.php
            $entities = EntityProvider::getEntities($this->con, $categoryId, 30);
        } 
        // else if ($tvShows) {
        //     $entities = EntityProvider::getTVShowEntities($this->con, $categoryId, 30);
        // } else {
        //     $entities = EntityProvider::getMoviesEntities($this->con, $categoryId, 30);
        // }

        // if there is no entity, then we want to just return nothing
        if (sizeof($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con, $this->username);
        // foreach ($entities as $entity) {
        //     $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
        // }

        return "<div class='category'>
                    <a href='category.php?id=$categoryId'>
                        <h3>$title</h3>
                    </a>

                    <div class='entities'>
                        $entitiesHtml
                    </div>
                <div>";
    }

}
?>