<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albumes".
 *
 * @property int $id
 * @property string $titulo
 * @property string $anyo
 *
 * @property AlbumesCanciones[] $albumesCanciones
 * @property Canciones[] $cancions
 */
class Albumes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albumes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['anyo'], 'number'],
            [['titulo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'anyo' => 'Anyo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumesCanciones()
    {
        return $this->hasMany(AlbumesCanciones::className(), ['album_id' => 'id'])->inverseOf('album');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancions()
    {
        return $this->hasMany(Canciones::className(), ['id' => 'cancion_id'])->viaTable('albumes_canciones', ['album_id' => 'id']);
    }
}
