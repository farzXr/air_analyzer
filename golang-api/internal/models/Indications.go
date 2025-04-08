package models

type Indications struct {
	Id          uint16  `json:"id"`
	CH4         float32 `json:"ch4"`
	CO2         float32 `json:"co2"`
	CO          float32 `json:"co"`
	TVOC        float32 `json:"tvoc"`
	HCHO        float32 `json:"hcho"`
	Humidity    float32 `json:"humidity"`
	Temperature float32 `json:"temperature"`
	PM          float32 `json:"pm"`
	DateTime    string  `json:"dateTime"`
}
