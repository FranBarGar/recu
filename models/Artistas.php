<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artistas".
 *
 * @property int $id
 * @property string $nombre
 * @property string $biografia
 *
 * @property ArtistasCanciones[] $artistasCanciones
 * @property Canciones[] $cancions
 */
class Artistas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artistas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['biografia'], 'string'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'biografia' => 'Biografia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistasCanciones()
    {
        return $this->hasMany(ArtistasCanciones::className(), ['artista_id' => 'id'])->inverseOf('artista');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancions()
    {
        return $this->hasMany(Canciones::className(), ['id' => 'cancion_id'])->viaTable('artistas_canciones', ['artista_id' => 'id']);
    }
}
