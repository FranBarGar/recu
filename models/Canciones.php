<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "canciones".
 *
 * @property int $id
 * @property string $titulo
 *
 * @property AlbumesCanciones[] $albumesCanciones
 * @property Albumes[] $albums
 * @property ArtistasCanciones[] $artistasCanciones
 * @property Artistas[] $artistas
 */
class Canciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'canciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumesCanciones()
    {
        return $this->hasMany(AlbumesCanciones::className(), ['cancion_id' => 'id'])->inverseOf('cancion');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Albumes::className(), ['id' => 'album_id'])->viaTable('albumes_canciones', ['cancion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistasCanciones()
    {
        return $this->hasMany(ArtistasCanciones::className(), ['cancion_id' => 'id'])->inverseOf('cancion');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistas()
    {
        return $this->hasMany(Artistas::className(), ['id' => 'artista_id'])->viaTable('artistas_canciones', ['cancion_id' => 'id']);
    }
}
