<?php 
class PreviewProvider {

    private $con;
    private $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

  
    // public function createCategoryPreviewVideo($categoryId) {
    //     $entitiesArray = EntityProvider::getEntities($this->con, $categoryId, 1);

    //     if (sizeof($entitiesArray) == 0) {
    //         ErrorMessage::show("No TV shows to display.");
    //     }

    //     return $this->createPreviewVideo($entitiesArray[0]);
    // }

    // public function createTVShowPreviewVideo() {
    //     $entitiesArray = EntityProvider::getTVShowEntities($this->con, null, 1);

    //     if (sizeof($entitiesArray) == 0) {
    //         ErrorMessage::show("No TV shows to display.");
    //     }

    //     return $this->createPreviewVideo($entitiesArray[0]);
    // }

    // public function createMoviesPreviewVideo() {
    //     $entitiesArray = EntityProvider::getMoviesEntities($this->con, null, 1);

    //     if (sizeof($entitiesArray) == 0) {
    //         ErrorMessage::show("No movies to display.");
    //     }

    //     return $this->createPreviewVideo($entitiesArray[0]);
    // }


    public function createPreviewVideo($entity) {

        // when the entity is  null, we will create
       if ($entity == null) {
           $entity = $this->getRandomEntity();
           
       }

       //functions are in entity.php 
       $id = $entity->getId();
       $name = $entity->getName();
       $preview = $entity->getPreview();
       $thumbnail = $entity->getThumbnail();
       echo $name;
    // //    $videoId = VideoProvider::getEntityVideoForUser($this->con, $id, $this->username);
       
    //    $video = new Video($this->con, $videoId);
    //    $inProgress = $video->isInProgress($this->username);
    //    $playButtonText = $inProgress ? "Continue watching" : "Play";  
    //    $seasonEpisode = $video->getSeasonAndEpisode();
    //    $subHeading = $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";

       return "<div class='previewContainer'>
                    <img src='$thumbnail' class='previewImage' hidden>
                    
                    <video autoplay muted class='previewVideo' onended='previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>

                    <div class='previewOverlay'>
                        <div class='mainDetails'>
                            <h3>$name</h3>
                            $subHeading 
                            <div class='buttons'>
                                <button onclick='watchVideo($videoId)'><i class='fas fa-play'></i> $playButtonText</button>
                                <button onclick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button>
                            </div>
                        </div>
                    </div>

                </div>";
    }

    // public function createEntityPreviewSquare($entity) {
    //     $id = $entity->getid();
    //     $thumbnail = $entity->getThumbnail();
    //     $name = $entity->getName();

    //     return "<a href='entity.php?id=$id'>
    //                 <div class='previewContainer small'>
    //                     <img src='$thumbnail' title='$name'>
    //                 </div>
    //             </a>";
    // }

    private function getRandomEntity() {
        $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
        $query->execute();

        // this is how we get data from a single query in PHP
        // get the data and store it in assiotive_array -- like a key value pair
        $row = $query->fetch(PDO::FETCH_ASSOC);

        
        return new Entity($this->con, $row);

        // $entity = EntityProvider::getEntities($this->con, null, 1);
        // return $entity[0];
    }
}
