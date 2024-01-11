<?php 
class Nutrition {
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Ensure you have a Database class that handles database operations
    }

    public function insert_diet($dietName){
        $diet = $this->db->select("SELECT * FROM diet WHERE dietDescription = '$dietName' LIMIT 1");
        if(isset($diet->num_rows) && $diet->num_rows > 0){
            $diet = mysqli_fetch_assoc($diet);
            $data = [
                "date" => date ('Y-m-d'),
                "caloriesConsumed" => $diet['calories'],
                "carbsConsumed" => $diet['carbs'],
                "proteinsConsumed" => $diet['proteins'],
                "fatsConsumed" => $diet['fats']
            ];
            $res = $this->db->insert("dietlog", $data);
            if($res){
                return "Diet added successfully!";
            } else {
                return "Something went wrong!";
            }
        } else {
            return "Diet item not found!";
        }
    }

    public function get_today_diets(){
        $today = date ('Y-m-d');
        return $this->db->select("SELECT * FROM dietlog WHERE date = '$today'");
    }

    public function get_list(){
        return $this->db->select("SELECT * FROM diet");
    }
    // Inside your Nutrition class
    public function get_diet_items(){
    return $this->db->select("SELECT * FROM diet");
}   

}
?>