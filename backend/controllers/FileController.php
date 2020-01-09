<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\UploadForm;
use yii\web\UploadedFile;

class FileController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                //file is uploaded successfully
                $fileName =  $model->imageFile->baseName;
                return $this->render('upload_ok', ['fileName' => $fileName]);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}