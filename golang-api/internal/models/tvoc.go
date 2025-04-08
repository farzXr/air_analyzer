package models

type TVOC struct {
	Id       uint16  `json:"id"`
	Value    float32 `json:"value"`
	DateTime string  `json:"dateTime"`
}
