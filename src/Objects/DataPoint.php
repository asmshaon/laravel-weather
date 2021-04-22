<?php

namespace Vemcogroup\Weather\Objects;

use Carbon\Carbon;

class DataPoint
{
    private $data;
    private $icon;
    private $time;
    private $ozone;
    private $summary;
    private $dewPoint;
    private $humidity;
    private $pressure;
    private $moonPhase;
    private $windSpeed;
    private $visibility;
    private $cloudCover;
    private $sunsetTime;
    private $sunriseTime;
    private $temperature;
    private $windBearing;
    private $precipitation;
    private $apparentTemperature;
    private $nearestStormBearing;
    private $nearestStormDistance;

    public function __construct($data)
    {
        if (is_array($data)) {
            $data = (object) $data;
        }

        $this->data = $data;

        if (isset($data->time)) {
            $this->time = Carbon::parse($data->time);
        }
        if (isset($data->summary)) {
            $this->summary = $data->summary;
        }
        if (isset($data->icon)) {
            $this->icon = $data->icon;
        }
        if (isset($data->sunriseTime)) {
            $this->sunriseTime = Carbon::parse($data->sunriseTime);
        }
        if (isset($data->sunsetTime)) {
            $this->sunsetTime = Carbon::parse($data->sunsetTime);
        }
        if (isset($data->moonPhase)) {
            $this->moonPhase = $data->moonPhase;
        }
        if (isset($data->nearestStormDistance)) {
            $this->nearestStormDistance = $data->nearestStormDistance;
        }
        if (isset($data->nearestStormBearing)) {
            $this->nearestStormBearing = $data->nearestStormBearing;
        }

        $this->precipitation = new Precipitation(
            ($data->precipIntensity ?? null),
            ($data->precipIntensityMax ?? null),
            ($data->precipIntensityMaxTime ?? null),
            ($data->precipProbability ?? null),
            ($data->precipType ?? null),
            ($data->precipAccumulation ?? null)
        );
        $this->temperature = new Temperature(
            ($data->temperature ?? null),
            ($data->temperatureMin ?? null),
            ($data->temperatureMinTime ?? null),
            ($data->temperatureMax ?? null),
            ($data->temperatureMaxTime ?? null)
        );
        $this->apparentTemperature = new Temperature(
            ($data->apparentTemperature ?? null),
            ($data->apparentTemperatureMin ?? null),
            ($data->apparentTemperatureMinTime ?? null),
            ($data->apparentTemperatureMax ?? null),
            ($data->apparentTemperatureMaxTime ?? null)
        );

        if (isset($data->dewPoint)) {
            $this->dewPoint = $data->dewPoint;
        }
        if (isset($data->windSpeed)) {
            $this->windSpeed = $data->windSpeed;
        }
        if (isset($data->windBearing)) {
            $this->windBearing = $data->windBearing;
        }
        if (isset($data->cloudCover)) {
            $this->cloudCover = $data->cloudCover;
        }
        if (isset($data->humidity)) {
            $this->humidity = $data->humidity;
        }
        if (isset($data->pressure)) {
            $this->pressure = $data->pressure;
        }
        if (isset($data->visibility)) {
            $this->visibility = $data->visibility;
        }
        if (isset($data->ozone)) {
            $this->ozone = $data->ozone;
        }
    }

    public function getTime(): ?Carbon
    {
        return $this->time;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getSunriseTime(): ?Carbon
    {
        return $this->sunriseTime;
    }

    public function getSunsetTime(): ?Carbon
    {
        return $this->sunsetTime;
    }

    public function getMoonPhase(): ?float
    {
        return $this->moonPhase;
    }

    public function getNearestStormDistance(): ?int
    {
        return $this->nearestStormDistance;
    }

    public function getNearestStormBearing(): ?int
    {
        return $this->nearestStormBearing;
    }

    public function getPrecipitation(): Precipitation
    {
        return $this->precipitation;
    }

    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }

    public function getApparentTemperature(): Temperature
    {
        return $this->apparentTemperature;
    }

    public function getDewPoint(): ?float
    {
        return $this->dewPoint;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function getWindBearing(): ?int
    {
        return $this->windBearing;
    }

    public function getCloudCover(): ?float
    {
        return $this->cloudCover;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function getPressure(): ?float
    {
        return $this->pressure;
    }

    public function getVisibility(): ?float
    {
        return $this->visibility;
    }

    public function getOzone(): ?float
    {
        return $this->ozone;
    }

    public function getData()
    {
        return $this->data;
    }
}
