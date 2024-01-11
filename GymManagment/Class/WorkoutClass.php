
<?php
class Workout {
    private $db;

    public function __construct()
    {
        $this -> db = new Database;
    }
    public function insert_workout($workoutname){
        $workout =  $this->db->select("select * from workout where name = '$workoutname' limit 1");
        if(isset($workout->num_rows)){
            $workout = mysqli_fetch_assoc($workout);
            $data = [
                "date"=>date ('Y-m-d'),
                "duration"=>$workout['duration'],
                "caloriesBurned"=>$workout['caloriesBurned']
                ];
                $res =  $this->db->insert("workoutlog",$data);
                if($res){
                    return "Excerise added Sucessflull!";
                }else{
                    return "Some thing went worng!";
                }
           
        }else{
            return "Excerise Not Found!";
        }
    }

    public function get_today_exercises(){
        $today = date ('Y-m-d');
         return $this->db->select("select * from workoutlog where date = '$today'");
    }

    public function get_list(){
        return $this->db->select("select * from workout");
    }

}

?>
