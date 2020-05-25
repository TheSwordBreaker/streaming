sudo apt-get update
sudo apt-get remove docker docker-engine docker.io

echo "Installing Docker"
sudo apt install docker.io -y


sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker ${USER}
docker --version

echo "Installing Docker-compose"
sudo curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version

echo "Done"