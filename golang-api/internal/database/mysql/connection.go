package mysql

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
)

var DB *sql.DB

func ConnectionMySql() {
	var err error
	dsn := "farzXr:4848@tcp(laravel_mysql)/laravel"
	DB, err = sql.Open("mysql", dsn)
	if err != nil {
		panic("error connecting to database")
	}
	if err := DB.Ping(); err != nil {
		panic("error pinging database")
	}
	fmt.Println("Connected to database")
}
