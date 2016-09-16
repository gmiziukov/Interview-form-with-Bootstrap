<?php
session_start();

require_once __DIR__.'/../core/controls/ManageCPanel.php';

$errorSelectBox = "box-none";
$successInsertBox = "box-none";
$errorInsertBox = "box-none";
$successUpdateBox = "box-none";
$errorUpdateBox = "box-none";
$successDeleteBox = "box-none";
$errorDeleteBox = "box-none";

$manageCPanel = new ManageCPanel();
$modelCPanel = new ModelCPanel();

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemAddNewOrganisation" && $_POST['isAddOrganisation'] == true)
{
    $result = $manageCPanel->AddNewOrganisation($_POST['organisationName']);

    if($result)
    {
        $successInsertBox = "box-block";
    }
    else
    {
        $errorInsertBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemAddNewInterview" && $_POST['isAddInterview'] == true)
{
    $result = $manageCPanel->AddNewInterview($_POST['interviewName'], $_POST['dateTo'], $_POST['dateFrom'], $_POST['idOrganisation']);

    if($result)
    {
        $successInsertBox = "box-block";
    }
    else
    {
        $errorInsertBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemAddNewQuestion" && $_POST['isAddQuestion'] == true)
{
    $result = $manageCPanel->AddNewQuestion($_POST['questionName'], $_POST['orderView'], $_POST['idInterview']);

    if($result)
    {
        $successInsertBox = "box-block";
    }
    else
    {
        $errorInsertBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemAddNewAnswer" && $_POST['isAddAnswer'] == true)
{
    if(isset($_POST['isRequired']) && !empty($_POST['isRequired']))
    {
        $isRequired = 1;
    }
    else
    {
        $isRequired = 0;
    }

    $result = $manageCPanel->AddNewAnswer($_POST['answerName'], $_POST['groupAnswer'], $_POST['typeAnswer'], $isRequired, $_POST['orderView'], $_POST['idQuestion']);

    if($result)
    {
        $successInsertBox = "box-block";
    }
    else
    {
        $errorInsertBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemPacketLoad" && $_POST['isUpLoad'] == true)
{
    $tmpName = $_FILES['upLoadFile']['tmp_name'];
    $result = $manageCPanel->UpLoadFile($tmpName, $_POST['idInterview']);

    if($result)
    {
        $successInsertBox = "box-block";
    }
    else
    {
        $errorInsertBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemManageOrganisation" && $_POST['isUpdateOrganisation'] == true)
{
    $result = $manageCPanel->UpdateOrganisation($_POST['idOrganisation'], $_POST['organisationName']);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "ItemManageInterview" && $_POST['isUpdateInterview'] == true)
{
    if(isset($_POST['isActive']) && !empty($_POST['isActive']))
    {
        $isActive = 1;
    }
    else
    {
        $isActive = 0;
    }

    $result = $manageCPanel->UpdateInterview($_POST['idInterview'], $_POST['interviewName'], $_POST['dateTo'], $_POST['dateFrom'], $isActive);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "LinkEditQuestionAnswer" && $_POST['isUpdateQuestion'] == true)
{
    $result = $manageCPanel->UpdateQuestion($_POST['idQuestion'], $_POST['questionName'], $_POST['orderView']);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_POST['view']) && !empty($_POST['view'])) && $_POST['view'] == "LinkEditQuestionAnswer" && $_POST['isUpdateAnswer'] == true)
{
    if(isset($_POST['isRequired']) && !empty($_POST['isRequired']))
    {
        $isRequired = 1;
    }
    else
    {
        $isRequired = 0;
    }

    $result = $manageCPanel->UpdateAnswer($_POST['idAnswer'], $_POST['answerName'], $_POST['groupAnswer'], $_POST['typeAnswer'], $isRequired, $_POST['orderView']);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_GET['view']) && !empty($_GET['view'])) && $_GET['view'] == "ItemManageOrganisation" && $_GET['isDeleteOrganisation'] == true)
{
    $result = $manageCPanel->DeleteOrganisation($_GET['idOrganisation']);

    if($result)
    {
        $successUpdateBox = "box-none";
        $successDeleteBox = "box-block";
    }
    else
    {
        $errorUpdateBox = "box-none";
        $errorDeleteBox = "box-block";
    }
}

if((isset($_GET['view']) && !empty($_GET['view'])) && $_GET['view'] == "ItemManageInterview" && $_GET['isDeleteInterview'] == true)
{
    $result = $manageCPanel->DeleteInterview($_GET['idInterview']);

    if($result)
    {
        $successUpdateBox = "box-none";
        $successDeleteBox = "box-block";
    }
    else
    {
        $errorUpdateBox = "box-none";
        $errorDeleteBox = "box-block";
    }
}

if((isset($_GET['view']) && !empty($_GET['view'])) && $_GET['view'] == "LinkEditQuestionAnswer" && $_GET['isDeleteQuestion'] == true)
{
    $result = $manageCPanel->DeleteQuestion($_GET['idQuestion']);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_GET['view']) && !empty($_GET['view'])) && $_GET['view'] == "LinkEditQuestionAnswer" && $_GET['isDeleteAnswer'] == true)
{
    $result = $manageCPanel->DeleteAnswer($_GET['idAnswer']);

    if($result)
    {
        $successDeleteBox = "box-none";
        $successUpdateBox = "box-block";
    }
    else
    {
        $errorDeleteBox = "box-none";
        $errorUpdateBox = "box-block";
    }
}

if((isset($_POST['userName']) && !empty($_POST['userName'])) && (isset($_POST['password']) && !empty($_POST['password'])))
{
    $arrayUsers = $modelCPanel->GetUsersValue($_POST['userName']);

    if($arrayUsers[0]['UserName'] == $_POST['userName'] && $arrayUsers[0]['Password'] == md5($_POST['password']))
    {
        $view = "CPanel";
        $_SESSION['UserName'] = $arrayUsers[0]['UserName'];

        $statisticOrganisation = $modelCPanel->GetStatisticOrganisation();
        $statisticInterview = $modelCPanel->GetStatisticInterview();
        $statisticQuestion = $modelCPanel->GetStatisticQuestion();
        $statisticHit = $modelCPanel->GetStatisticHit();
        $statisticHitTxtField = $modelCPanel->GetStatisticHitTxtField();
    }
    else
    {
        $errorSelectBox = "box-block";

        $view = "Login";
    }
}
else
{
    if(isset($_SESSION['UserName']) && !isset($_GET['exit']))
    {
        $view = "CPanel";

        $statisticOrganisation = $modelCPanel->GetStatisticOrganisation();
        $statisticInterview = $modelCPanel->GetStatisticInterview();
        $statisticQuestion = $modelCPanel->GetStatisticQuestion();
        $statisticHit = $modelCPanel->GetStatisticHit();
        $statisticHitTxtField = $modelCPanel->GetStatisticHitTxtField();
    }
    else
    {
        if(!empty($_GET['exit']) && $_GET['exit'] == true)
        {
            session_destroy();
        }

        $view = "Login";
    }
}

if(isset($_POST['view']))
{
    $view = $_POST['view'];
}
elseif(isset($_GET['view']))
{
    $view = $_GET['view'];
}

if($view == "ItemAddNewInterview" || $view == "ItemManageOrganisation" || $view == "ViewResultsInterview" || $view == "ItemManageQuestionAnswer")
    $arrayOrganisations  = $modelCPanel->GetData("Organisations");

if($view == "ItemAddNewQuestion" || $view == "ItemPacketLoad")
    $arrayInterviews = $modelCPanel->GetData("Interviews");

if($view == "ItemAddNewAnswer")
    $arrayQuestions = $modelCPanel->GetData("Questions");

if($view == "ItemManageInterview" || $view == "ViewResultsInterview" || $view == "ItemManageQuestionAnswer")
    $arrayAllInterview = $modelCPanel->GetInterview();

require_once __DIR__.'/../core/views/'.$view.'.php';

?>