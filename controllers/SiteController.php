<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Teachers;
use app\models\Pdfs;
use yii\web\UploadedFile;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('home');
    }

    public function actionAdd()
    {
        $teacher = new Teachers();
        $pdf = new Pdfs();

        $formData = Yii::$app->request->post();

        if($teacher->load($formData) && $pdf->load($formData)){

            $imageName = $teacher->name;

            if ($teacher->file = UploadedFile::getInstance($teacher, 'file')) {
                $teacher->file->saveAs('img/'.$imageName.'.'.$teacher->file->extension);
                //save the path in DB..
                $teacher->photo = '/img/'.$imageName.'.'.$teacher->file->extension;
            }

            if ($pdf->file = UploadedFile::getInstance($pdf, 'file')) {
                $pdf->file->saveAs('pdf/'.$pdf->file);
                //save the path in DB..
                $pdf->teachername = $teacher->name;
                $pdf->pdfname = $pdf->file; 
                $pdf->pdf = '/pdf/'.$pdf->file;
                $pdf->save();
            }
            
            
            if($teacher->save()){
                Yii::$app->getSession()->setFlash('message', 'Добавлено');
                return $this->redirect(['pm1']);
            }else{
                Yii::$app->getSession()->setFlash('message', 'Не удалось добавить');

            }
        }
        return $this->render('add', ['teacher' => $teacher, 'pdf' => $pdf]);
    }

    public function actionUpdate($id){
        $teacher = Teachers::findOne($id);
        $pdfs = Pdfs::find()->all();
        $pdf = new Pdfs();
        $formData = Yii::$app->request->post();

        if ($pdf->load($formData) && $pdf->file = UploadedFile::getInstance($pdf, 'file')) {
            $pdf->file->saveAs('pdf/'.$pdf->file);
            //save the path in DB..
            $pdf->teachername = $teacher->name;
            $pdf->pdfname = $pdf->file; 
            $pdf->pdf = '/pdf/'.$pdf->file;
            $pdf->save();
        }

        if($teacher->load(Yii::$app->request->post()) && $teacher->save()){
            Yii::$app->getSession()->setFlash('message', 'Изменено');
            return $this->redirect(['pm1', 'id' => $teacher->id]);
        }

        return $this->render('update', ['teacher' => $teacher, 'pdf' => $pdf, 'pdfs' => $pdfs]);
    }

    public function actionView($id){
        $teacher = Teachers::findOne($id);
        $pdfs = Pdfs::find()->all();
        return $this->render('view', ['teacher' => $teacher, 'pdfs' => $pdfs]);
    }

    public function actionDownload($filename){
        $path = "C:\\xampp\htdocs\baishev\web".$filename;
        if(file_exists($path)){
            return Yii::$app->response->sendFile($path);
        }
    }

    public function actionDelete2($tid, $pdfid){
        
        
        $pdf = Pdfs::findOne($pdfid)->delete();
        if($pdf){
            
            Yii::$app->getSession()->setFlash('message', 'Удалено');
            return $this->redirect(['update', 'id' => $tid]);
        }
    }

    public function actionDelete($id){
        
        
        $teacher = Teachers::findOne($id)->delete();
        if($teacher){
            
            Yii::$app->getSession()->setFlash('message', 'Удалено');
            return $this->redirect(['pm1']);
        }
    }

    public function actionPhysmath()
    {
        return $this->render('physmath');
    }

    public function actionPm1()
    {
        $teachers = Teachers::find()->all();
        $pdfs = Pdfs::find()->all();
        return $this->render('pm1', ['teachers' => $teachers, 'pdfs' => $pdfs]);
    }
    public function actionPm2()
    {
        return $this->render('pm2');
    }
    public function actionPm3()
    {
        return $this->render('pm3');
    }
    public function actionPm4()
    {
        return $this->render('pm4');
    }

    public function actionBc1()
    {
        return $this->render('bc1');
    }
    public function actionBc2()
    {
        return $this->render('bc2');
    }
    public function actionBc3()
    {
        return $this->render('bc3');
    }
    public function actionBc4()
    {
        return $this->render('bc4');
    }

    public function actionH1()
    {
        return $this->render('h1');
    }
    public function actionH2()
    {
        return $this->render('h2');
    }
    public function actionH3()
    {
        return $this->render('h3');
    }
    public function actionH4()
    {
        return $this->render('h4');
    }

    public function actionBiochem()
    {
        return $this->render('biochem');
    }

    public function actionHuman()
    {
        return $this->render('human');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
