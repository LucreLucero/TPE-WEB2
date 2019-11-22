<?php
require_once('./model/GenderModel.php');
require_once('./model/SerieModel.php');
require_once('./model/UserModel.php');
require_once('./view/GenderView.php');
require_once('./controller/LogInController.php');



class GenderController{
    private $LogInController;
    private $model;
    // private $
    private $modelSerie;
    private $view;
    // private $seriesView;

    public function __construct(){
        // session_start();//llamo al sesion start
        $this->LogInController = new LoginController();
        $this->model = new GenderModel();
        $this->modelSerie = new SerieModel();
        //paso la function al constructor por que siempre se van a mostrar los generos
        $isAdmin = $this ->LogInController ->isAdmin();
        // var_dump($isAdmin);
        $this->view = new GenderView($isAdmin);
        // $this->seriesView = new SeriesView();

    }
    
    public function showIndex(){
        $genders = $this->model->getGenders();//obtengo los generos desde el model
        $series = $this ->modelSerie -> getSeries();
        // $arrImage = [];
        $images = [];
        // foreach($series as $serie){
        //     // var_dump($serie['id_serie']); die;
        //     $images = $this->modelSerie-> getImage($serie['id_serie']);
        //     // $arrImage.array_push($images);
        //     // var_dump($this->modelSerie-> getImage($serie['id_serie']));die;
            
        // }
        // var_dump($images);die;
        // $images.array_push($x); 
        // $usuarioLogueado = $this ->LogInController-> checkLoggedIn();//chequep que esté logueado        
        $this ->view -> displayVisitante($genders, $series, $images);
    }
    public function showIndexAdmin(){//por defecto $existe es false
        $this ->LogInController ->checkLoggedIn();//chequep que esté logueado
        $this ->LogInController ->verifyAdmin();
        $this ->view -> displayAdmin();

    }

    public function showGenders($existeGender = false, $existeSerie = false){//por defecto $existe es false
        $this ->LogInController-> checkLoggedIn();//chequep que esté logueado
        $this ->LogInController ->verifyAdmin();
        $genders = $this->model->getGenders();
        $series = $this ->modelSerie -> getSeries();
        // var_dump ("holaa"); die();
        
        $this ->view -> displayGenders($genders, $series, $existeGender, $existeSerie);
    }
    // MUESTRO LAS SERIES PARA ADMIN
    public function showSeries( $existeSerie = false){//por defecto $existe es false
        $this ->LogInController-> checkLoggedIn();//chequep que esté logueado
        $this ->LogInController ->verifyAdmin();
        $genders = $this->model->getGenders();
        $series = $this ->modelSerie -> getSeries();
        // $images = $this->modelSerie-> getImage($series->id_serie);

        // var_dump ($series); die();
        $this ->view -> displaySeries($genders, $series, $existeSerie);//, $images);
    }
    // ---------------
    public function getGender($genderName){
        $gender = $this->model->getGender($genderName);  
        return  $gender; 
        // $this ->view -> displayGenders($genders);
    }

    // public function getGenderByID($infoSerie){
    //     $genderID = $infoSerie ->id_gender;
    //     $genderName = $this->model->getGenderByID($genderID);  
    //     return  $genderName; 
    //     // $this ->view -> displayGenders($genders);
    // }

    // PARA HACER EL ORDENAMIENTO POR GENERO-----------
    public function getGenders(){
        $genders = $this->model->getGenders();
        $this ->view -> displayGenders($genders);
    }

    // -------COSAS DE ADMINS QUE SE LOGUEAN---------
    public function addGender(){
        
        $this ->LogInController-> checkLoggedIn();//chequep que esté logueado
        //FALTA CHEQUEAR QUE SEA ADMIN
        $nameGender = $_POST['nameGenderAdd'];//guardo el nameGender en variable
        if(isset($_POST['nameGenderAdd'])){//si está seteado
            // busco en la BBDD un gender con el mismo name guardado en $nameGender
            $genderNameBBDD = $this->model->getGender($nameGender);
            // echo $nameGender; die;
            // var_dump($genderNameBBDD == null); die;
            if($genderNameBBDD == null){
                // var_dump("lala");die;
                // var_dump ($genderNameBBDD); die();
                $this->model->insertGender($nameGender);
                header("Location: " . BASE_URL. "genders");
            }
            else{
                $this -> showIndexAdmin($existeGender = true);
                // var_dump("ya existe");die;//hacer el fetch de la api para corroborar esto
                // header("Location: " . BASE_URL. "enterSession");
            }
        }
    }

    public function editGender(){//edit gender recibe el id del genero a editar mediante el string num 2 de la url
        // var_dump("hola");
        //         die();
        $this ->LogInController-> checkLoggedIn();
        if(isset($_POST['nameGenderEdit']) && isset($_POST['genderEdit'])){
            $nameGender = $_POST['nameGenderEdit'];
            $genderEdit = $_POST['genderEdit'];
            $this->model->editGender($nameGender, $genderEdit);
            header("Location: " . BASE_URL . "genders");
        }
    }

    // acomodar el delete - aun no funciona
    public function deleteGender(){
        $this ->LogInController ->checkLoggedIn();
        // die();
        $genderID = $_POST['gender'];
        $serieID = $this->modelSerie ->getSeriesOfGender($genderID);
        foreach ($serieID as $serie ) {
            $ID = $serie->id_serie;
            $this->modelSerie->deleteSerieByGender($ID);    
        }
     
        $this->model->deleteGender($genderID);
        header("Location: " . BASE_URL . "genders");
    }
    
    // public function getGender($gender){
    //     $genderFor = $this->model->getGender($gender);
    //     return $genderFor;   
    // }
}