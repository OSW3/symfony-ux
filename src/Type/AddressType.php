<?php 
namespace OSW3\UX\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    const STREET_NUMBER = true;
    const STREET_NUMBER_EXTENSION = true;
    const STREET_TYPE = true;
    const STREET_NAME = true;
    const BUILDING = true;
    const ESTABLISHMENT = true;
    const IS_FLAT = true;
    const FLOOR = true;
    const FLOOR_NUMBER = true;
    const HAS_ELEVATOR = true;
    const POSTAL_CODE = true;
    const POSTAL_CODE_PREFIX = true;
    const POSTAL_CODE_SUFFIX = true;
    const CITY = true;
    const CEDEX = true;
    const POSTBOXCODE = true;
    const LOCALITY = true;
    const ADMINISTRATIVE_AREA_LEVEL_1 = true;
    const ADMINISTRATIVE_AREA_LEVEL_2 = true;
    const ADMINISTRATIVE_AREA_LEVEL_3 = true;
    const ADMINISTRATIVE_AREA_LEVEL_4 = true;
    const ADMINISTRATIVE_AREA_LEVEL_5 = true;
    const COUNTRY = true;
    const LATITUDE = true;
    const LONGITUDE = true;
    const ALTITUDE = true;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($options['streetNumber']) {
            $builder->add('streetNumber', TextType::class, []);
        }
        
        if ($options['streetNumberExtension']) {
            $builder->add('streetNumberExtension', TextType::class, []);
        }
        
        if ($options['streetType']) {
            $builder->add('streetType', TextType::class, []);
        }
        
        if ($options['streetName']) {
            $builder->add('streetName', TextType::class, []);
        }
        
        if ($options['building']) {
            $builder->add('building', TextType::class, []);
        }
        
        if ($options['establishment']) {
            $builder->add('establishment', TextType::class, []);
        }
        
        if ($options['isFlat']) {
            $builder->add('isFlat', CheckboxType::class, []);
        }
        
        if ($options['floor']) {
            $builder->add('floor', TextType::class, []);
        }
        
        if ($options['floorNumber']) {
            $builder->add('floorNumber', TextType::class, []);
        }
        
        if ($options['hasElevator']) {
            $builder->add('hasElevator', CheckboxType::class, []);
        }
        
        if ($options['postalCode']) {
            $builder->add('postalCode', TextType::class, []);
        }
        
        if ($options['postalCodePrefix']) {
            $builder->add('postalCodePrefix', TextType::class, []);
        }
        
        if ($options['postalCodeSuffix']) {
            $builder->add('postalCodeSuffix', TextType::class, []);
        }
        
        if ($options['city']) {
            $builder->add('city', TextType::class, []);
        }
        
        if ($options['cedex']) {
            $builder->add('cedex', TextType::class, []);
        }
        
        if ($options['postBoxCode']) {
            $builder->add('postBoxCode', TextType::class, []);
        }
        
        if ($options['locality']) {
            $builder->add('locality', TextType::class, []);
        }
        
        if ($options['administrativeAreaLevel1']) {
            $builder->add('administrativeAreaLevel1', TextType::class, []);
        }
        
        if ($options['administrativeAreaLevel2']) {
            $builder->add('administrativeAreaLevel2', TextType::class, []);
        }
        
        if ($options['administrativeAreaLevel3']) {
            $builder->add('administrativeAreaLevel3', TextType::class, []);
        }
        
        if ($options['administrativeAreaLevel4']) {
            $builder->add('administrativeAreaLevel4', TextType::class, []);
        }
        
        if ($options['administrativeAreaLevel5']) {
            $builder->add('administrativeAreaLevel5', TextType::class, []);
        }
        
        if ($options['country']) {
            $builder->add('country', TextType::class, []);
        }
        
        if ($options['latitude']) {
            $builder->add('latitude', TextType::class, []);
        }
        
        if ($options['longitude']) {
            $builder->add('longitude', TextType::class, []);
        }
        
        if ($options['altitude']) {
            $builder->add('altitude', TextType::class, []);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'streetNumber'            => static::STREET_NUMBER,
            'streetNumberExtension'   => static::STREET_NUMBER_EXTENSION,
            'streetType'              => static::STREET_TYPE,
            'streetName'              => static::STREET_NAME,
            'building'                => static::BUILDING,
            'establishment'           => static::ESTABLISHMENT,
            'isFlat'                  => static::IS_FLAT,
            'floor'                   => static::FLOOR,
            'floorNumber'             => static::FLOOR_NUMBER,
            'hasElevator'             => static::HAS_ELEVATOR,
            'postalCode'              => static::POSTAL_CODE,
            'postalCodePrefix'        => static::POSTAL_CODE_PREFIX,
            'postalCodeSuffix'        => static::POSTAL_CODE_SUFFIX,
            'city'                    => static::CITY,
            'cedex'                   => static::CEDEX,
            'postBoxCode'             => static::POSTBOXCODE,
            'locality'                => static::LOCALITY,
            'administrativeAreaLevel1' => static::ADMINISTRATIVE_AREA_LEVEL_1,
            'administrativeAreaLevel2' => static::ADMINISTRATIVE_AREA_LEVEL_2,
            'administrativeAreaLevel3' => static::ADMINISTRATIVE_AREA_LEVEL_3,
            'administrativeAreaLevel4' => static::ADMINISTRATIVE_AREA_LEVEL_4,
            'administrativeAreaLevel5' => static::ADMINISTRATIVE_AREA_LEVEL_5,
            'country'                 => static::COUNTRY,
            'latitude'                => static::LATITUDE,
            'longitude'               => static::LONGITUDE,
            'altitude'                => static::ALTITUDE,
        ]);
    }
    
}