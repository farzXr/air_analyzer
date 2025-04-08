package models

type CO2 struct {
	Id       uint16  `json:"id"`
	Value    float32 `json:"value"`
	DateTime string  `json:"dateTime"`
}
