<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
//use backend\models\UploadImage;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
         $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        
        if ($model->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();
            
             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            if($model->imageFile && $model->validate()){
                
                // находим последний добавленный элемент в таблицу БД
                $last_item = Product::find()->orderBy('id DESC')->one();
                // выводим ID последнего элемента и добавляем 1, это будет ID добавляемого продукта
                $product_ID = $last_item->id + 1;
                $model->image = 'Prod_Image_ID_' . $product_ID . '.' . $model->imageFile->extension;
                            
                $fileSaveRes = $model->imageFile->saveAs(Yii::getAlias('@product_image'). '\\' . $model->image);
                        
                if(!$fileSaveRes){
                    $transaction->rollBack();
                    return $this->redirect('create', ['model' => $model]);
                }
            }
            
            // обнуляем поле, иначе вызывается 
            $model->imageFile = null;
            $model->created_date = date('Y-m-d H:i:s');
            if ($model->save()){
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{    
            $transaction->rollBack();
            return $this->redirect('create', ['model' => $model]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();
            
             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            $prevFileName = null;
            $uploadFileName = null;
            $fileSaveRes = null;
            
            if($model->imageFile && $model->validate()){
                        
                // записываем путь/имя ранее сохраненного изображения продукта, чтобы его удалить в случае успешной записи нового изображения
                $prevFileName = $model->image;
                $prev_file_path = Yii::getAlias('@product_image').'\\'.$prevFileName;

                $uploadFileName = 'Prod_Image_ID_' . $model->id. '.' . $model->imageFile->extension;
                    
                // запись в поле нового имени для загружаемого файла
                $model->image = $uploadFileName;
                            
                // записываем путь/имя_файла нового изображения
                $new_file_path = Yii::getAlias('@product_image').'\\'. $model->image;
                
                // если сохранение прошло то запишем в переменную статус true
                $fileSaveRes = $model->imageFile->saveAs($new_file_path);
                        
                if(!$fileSaveRes){
                    $transaction->rollBack();
                    return $this->redirect('update', ['model' => $model]);
                }
            }
            
            // обнуляем поле, иначе вызывается ошибка 
            $model->imageFile = null;
            if ($created_date == null) $model->created_date = date('Y-m-d H:i:s');
            if ($model->save()){
                if($prevFileName != $uploadFileName && $fileSaveRes && $prevFileName != 0){
                    unlink($prev_file_path);
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{    
            $transaction->rollBack();
            return $this->redirect('update', ['model' => $model]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $delItem = $this->findModel($id);
        if($delItem->status == 0){
        $del_image_prod = Yii::getAlias('@product_image').'\\'.$delItem->image;
        unlink($del_image_prod);
        $delItem->delete();
        return $this->redirect(['index']);
        }
        
         return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetImage($file_name) {

        $base_path = Yii::getAlias('@path').'\uploads\images\products'.'/';

        if (file_exists($base_path . $file_name)) {
            return Yii::$app->response->sendFile($base_path . $file_name);
        }

        return false;
    }
    
}
