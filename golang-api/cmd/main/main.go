package main

import (
	"golang-api/internal/database/mysql"
	"golang-api/internal/router"
	"golang-api/internal/websocket"
	"time"
)

func main() {
	r := router.InitRouter()

	mysql.ConnectionMySql()

	go r.Run(":8080")

	time.Sleep(1 * time.Second)

	websocket.InitClient()

	select {}
}
