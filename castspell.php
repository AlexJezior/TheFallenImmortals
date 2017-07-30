<?php
session_name("icsession");
session_start();
include('db.php');

$getchar = mysql_query("SELECT * FROM characters WHERE id='".$_SESSION['userid']."'") or die(mysql_error());
$char = mysql_fetch_assoc($getchar);

$spell = explode(', ', $char['spells']);

if(isset($_POST['charge'])){
    $charge = explode(', ', $_POST['charge']);
    if($charge[1] != $spell[0] && $charge[1] != $spell[1] && $charge[1] != $spell[2] && $charge[1] != $spell[3] && $charge[1] != $spell[4] && $charge[1] != $spell[5]){
    	print"alert('You don\'t even have this spell!');";
    }else{
    	$blessing = explode(', ', $char['blessing']);
    	if($charge[0] == 1){
    		$blessing[0] = $charge[1];
    	}elseif($charge[0] == 2){
    		$blessing[1] = $charge[1];
    	}elseif($charge[0] == 3){
    		$blessing[2] = $charge[1];
    	}elseif($charge[0] == 4){
    		$blessing[3] = $charge[1];
    	}elseif($charge[0] == 5){
    		$blessing[4] = $charge[1];
    	}elseif($charge[0] == 6){
    		$blessing[5] = $charge[1];
    	}elseif($charge[0] == 7){
    		$blessing[6] = $charge[1];
    	}elseif($charge[0] == 8){
    		$blessing[7] = $charge[1];
    	}elseif($charge[0] == 9){
    		$blessing[8] = $charge[1];
    	}else{
    		print"alert('Something went terribly wrong with your affinitys.');";
    	}
    	$updateBlessings = "".$blessing[0].", ".$blessing[1].", ".$blessing[2].", ".$blessing[3].", ".$blessing[4].", ".$blessing[5].", ".$blessing[6].", ".$blessing[7].", ".$blessing[8]."";
    	$blessingsINmysql = mysql_query("UPDATE characters SET blessing='".$updateBlessings."' WHERE id='".$_SESSION['userid']."'");
    	$NoCharge = mysql_query("UPDATE characters SET charge='None' WHERE id='".$_SESSION['userid']."'");
    	include('updatestats.php');
    }
}
elseif(isset($_POST['spellname']) && $spell[0] == $_POST['spellname'] || $spell[1] == $_POST['spellname'] || $spell[2] == $_POST['spellname'] || $spell[3] == $_POST['spellname'] || $spell[4] == $_POST['spellname'] || $spell[5] == $_POST['spellname'])
{
    $spellName = $_POST['spellname'];
    $getequip = mysql_query("SELECT * FROM inventory WHERE username='".$charname."' AND equipped='Yes'");
    if(mysql_num_rows($getequip) > "0")
    {
        while($equip = mysql_fetch_array($getequip))
        {
            $eqstrbon += $equip['strength'];
            $eqdexbon += $equip['dexterity'];
            $eqendbon += $equip['endurance'];
            $eqintbon += $equip['intelligence'];
            $eqconbon += $equip['concentration'];
        }
    }
    $charstr = $char['strength'] + $eqstrbon;
    $chardex = $char['dexterity'] + $eqdexbon;
    $charend = $char['endurance'] + $eqendbon;
    $charint = $char['intelligence'] + $eqintbon;
    $charcon = $char['concentration'] + $eqconbon;
	$blessingStats = explode(', ', $char['blessing']);
	if (in_array('Constitution', $blessingStats)) 
	{ 
	    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution'"); 
	    $level = mysql_fetch_assoc($result); 
	    $foo = 0; 
	    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
	    { 
	        if($blessingStats[$i] == 'Constitution') 
	        { 
	            $foo += $level['level']; 
	        } 
	    } 
	    $equation = $foo / 10; 
	    $totalend += $charend * $equation; 
	}
	if (in_array('Constitution II', $blessingStats)) 
	{ 
	    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution II'"); 
	    $level = mysql_fetch_assoc($result); 
	    $foo = 0; 
	    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
	    { 
	        if($blessingStats[$i] == 'Constitution II') 
	        { 
	            $foo += $level['level']; 
	        } 
	    } 
	    $equation = $foo / 10; 
	    $totalend += $charend * $equation; 
	}
	if (in_array('Constitution III', $blessingStats)) 
	{ 
	    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution III'"); 
	    $level = mysql_fetch_assoc($result); 
	    $foo = 0; 
	    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
	    { 
	        if($blessingStats[$i] == 'Constitution III') 
	        { 
	            $foo += $level['level']; 
	        } 
	    } 
	    $equation = $foo / 10; 
	    $totalend += $charend * $equation;
	}
	if (in_array('Constitution IV', $blessingStats)) 
	{ 
	    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution IV'"); 
	    $level = mysql_fetch_assoc($result); 
	    $foo = 0; 
	    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
	    { 
	        if($blessingStats[$i] == 'Constitution IV') 
	        { 
	            $foo += $level['level']; 
	        } 
	    } 
	    $equation = $foo / 10; 
	    $totalend += $charend * $equation;
	}
	if (in_array('Constitution V', $blessingStats)) 
	{ 
	    $result = mysql_query("SELECT level FROM affinity WHERE name='Constitution V'"); 
	    $level = mysql_fetch_assoc($result); 
	    $foo = 0; 
	    for($i = 0, $count = count($blessingStats); $i < $count; $i++) 
	    { 
	        if($blessingStats[$i] == 'Constitution V') 
	        { 
	            $foo += $level['level']; 
	        } 
	    } 
	    $equation = $foo / 10; 
	    $totalend += $charend * $equation; 
	}
	$charend = floor($charend + $totalend);
    
    if($spellName == "First Aid"){
        
        $enoughMana = $char['mana'] - 50;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend/10);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 50;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "First Aid II"){
        
        $enoughMana = $char['mana'] - 300;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend/8);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 300;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "First Aid III"){
        
        $enoughMana = $char['mana'] - 1000;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend/6);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 1000;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "First Aid IV"){
        
        $enoughMana = $char['mana'] - 3000;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend/4);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 3000;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "First Aid V"){
        
        $enoughMana = $char['mana'] - 10000;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend/2);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 10000;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "Full Heal"){
        
        $enoughMana = $char['mana'] - 10000;
        if($char['life'] >= $charend){
            print"alert('Your health is already full.')";
        }elseif($char['life'] <= 0){
            print"alert('You are dead and need to pay resurection costs.')";
        }elseif($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charHeal = floor($charend);
            $charHeal = $char['life'] + $charHeal;
            $charMana = $char['mana'] - 10000;
            $healCharacter = mysql_query("UPDATE characters SET life='".$charHeal."' WHERE username='".$char['username']."'");
            $healCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('You have been healed!')";
        }
        
    }elseif($spellName == "Might"){
        
        $enoughMana = $char['mana'] - 1000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 1000;
            $charge = "Might";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Might. Choose an open affinity box to cast Might upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Might II"){
        
        $enoughMana = $char['mana'] - 2500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 2500;
            $charge = "Might II";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Might II. Choose an open affinity box to cast Might II upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Might III"){
        
        $enoughMana = $char['mana'] - 7500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 7500;
            $charge = "Might III";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Might III. Choose an open affinity box to cast Might III upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Might IV"){
        
        $enoughMana = $char['mana'] - 20000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 20000;
            $charge = "Might IV";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Might IV. Choose an open affinity box to cast Might IV upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Might V"){
        
        $enoughMana = $char['mana'] - 50000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 50000;
            $charge = "Might V";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Might V. Choose an open affinity box to cast Might V upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Speed"){
        
        $enoughMana = $char['mana'] - 1000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 1000;
            $charge = "Speed";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Speed. Choose an open affinity box to cast Speed upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Speed II"){
        
        $enoughMana = $char['mana'] - 2500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 2500;
            $charge = "Speed II";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Speed II. Choose an open affinity box to cast Speed II upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Speed III"){
        
        $enoughMana = $char['mana'] - 7500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 7500;
            $charge = "Speed III";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Speed III. Choose an open affinity box to cast Speed III upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Speed IV"){
        
        $enoughMana = $char['mana'] - 20000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 20000;
            $charge = "Speed IV";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Speed IV. Choose an open affinity box to cast Speed IV upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Speed V"){
        
        $enoughMana = $char['mana'] - 50000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 50000;
            $charge = "Speed V";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Speed V. Choose an open affinity box to cast Speed V upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Constitution"){
        
        $enoughMana = $char['mana'] - 1000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 1000;
            $charge = "Constitution";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Constitution. Choose an open affinity box to cast Constitution upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Constitution II"){
        
        $enoughMana = $char['mana'] - 2500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 2500;
            $charge = "Constitution II";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Constitution II. Choose an open affinity box to cast Constitution II upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Constitution III"){
        
        $enoughMana = $char['mana'] - 7500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 7500;
            $charge = "Constitution III";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Constitution III. Choose an open affinity box to cast Constitution III upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Constitution IV"){
        
        $enoughMana = $char['mana'] - 20000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 20000;
            $charge = "Constitution IV";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Constitution IV. Choose an open affinity box to cast Constitution IV upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Constitution V"){
        
        $enoughMana = $char['mana'] - 50000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 50000;
            $charge = "Constitution V";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Constitution V. Choose an open affinity box to cast Constitution V upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Concentration"){
        
        $enoughMana = $char['mana'] - 1000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 1000;
            $charge = "Concentration";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Concentration. Choose an open affinity box to cast Concentration upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Concentration II"){
        
        $enoughMana = $char['mana'] - 2500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 2500;
            $charge = "Concentration II";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Concentration II. Choose an open affinity box to cast Concentration II upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Concentration III"){
        
        $enoughMana = $char['mana'] - 7500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 7500;
            $charge = "Concentration III";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Concentration III. Choose an open affinity box to cast Concentration III upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Concentration IV"){
        
        $enoughMana = $char['mana'] - 20000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 20000;
            $charge = "Concentration IV";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Concentration IV. Choose an open affinity box to cast Concentration IV upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Concentration V"){
        
        $enoughMana = $char['mana'] - 50000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 50000;
            $charge = "Concentration V";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Concentration V. Choose an open affinity box to cast Concentration V upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Intelligence"){
        
        $enoughMana = $char['mana'] - 1000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 1000;
            $charge = "Intelligence";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Intelligence. Choose an open affinity box to cast Intelligence upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Intelligence II"){
        
        $enoughMana = $char['mana'] - 2500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 2500;
            $charge = "Intelligence II";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Intelligence II. Choose an open affinity box to cast Intelligence II upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Intelligence III"){
        
        $enoughMana = $char['mana'] - 7500;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 7500;
            $charge = "Intelligence III";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Intelligence III. Choose an open affinity box to cast Intelligence III upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Intelligence IV"){
        
        $enoughMana = $char['mana'] - 20000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 20000;
            $charge = "Intelligence IV";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Intelligence IV. Choose an open affinity box to cast Intelligence IV upon yourself.');";
            include('updatestats.php');
        }
        
    }elseif($spellName == "Intelligence V"){
        
        $enoughMana = $char['mana'] - 50000;
        if($enoughMana < 0){
            print"alert('Not enough Mana.')";
        }else{
            $charMana = $char['mana'] - 50000;
            $charge = "Intelligence V";
            $castCharacter = mysql_query("UPDATE characters SET charge='".$charge."' WHERE username='".$char['username']."'");
            $castCharacter = mysql_query("UPDATE characters SET mana='".$charMana."' WHERE username='".$char['username']."'");
            print"alert('Your have charged up Intelligence V. Choose an open affinity box to cast Intelligence V upon yourself.');";
            include('updatestats.php');
        }
        
    }else{
        print"alert('No such spell!')";
    }
}
else
{
    print"alert('Go home cheater!')";
}

?>